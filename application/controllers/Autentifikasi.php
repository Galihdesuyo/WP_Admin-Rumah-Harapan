<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentifikasi extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus Diisi !!',
            'valid_email' => 'Email Tidak Benar !!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus Diisi !!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        // Jika User Ada
        if ($user) {
            // Cek Role_id
            if ($user['role_id'] == 1) {
                // Jika User Sudah Aktif
                if ($user['is_active'] == 1) {
                    // Cek Password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];

                        $this->session->set_userdata($data);
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Anda Salah !!</div>');
                        redirect('autentifikasi');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akun Anda Belum Diaktivasi !!</div>');
                    redirect('autentifikasi');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Anda Bukan Administrator !!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email Anda Tidak Terdaftar !!</div>');
            redirect('autentifikasi');
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum Diisi !!'
        ]);

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email Tidak Benar !!',
            'required' => 'Email Belum Diisi !!',
            'is_unique' => 'Email Sudah Terdaftar !!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password Belum Diisi !!',
            'matches' => 'Password Tidak Sama !!',
            'min_length' => 'Password Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('autentifikasi/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->ModelUser->simpanData($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat! Akun anda berhasil dibuat.</div>');
            redirect('autentifikasi');
        }
    }

    public function lupaPassword()
    {
        $data['judul'] = 'Lupa Password';

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'valid_email' => 'Email Tidak Benar !!',
            'required' => 'Email Belum Diisi !!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('autentifikasi/lupa-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $user = $this->ModelUser->cekData(['email' => $email])->row_array();

            if ($user) {
                // Store email in session for use in the next step
                $this->session->set_userdata('reset_email', $email);
                redirect('autentifikasi/passwordBaru');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar !!</div>');
                redirect('autentifikasi/lupaPassword');
            }
        }
    }

    public function passwordBaru()
    {
        $data['judul'] = 'Reset Password';
        $email = $this->session->userdata('reset_email');

        if (!$email) {
            redirect('autentifikasi/lupaPassword');
        }

        $data['user'] = $this->ModelUser->cekData(['email' => $email])->row_array();

        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
            'required' => 'Password Baru Harus Diisi !!',
            'min_length' => 'Password Tidak Boleh Kurang Dari 4 Digit !!',
            'matches' => 'Password Baru Tidak Sama Dengan Ulangi Password !!'
        ]);

        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
            'required' => 'Ulangi Password Harus Diisi !!',
            'min_length' => 'Password Tidak Boleh Kurang Dari 4 Digit !!',
            'matches' => 'Ulangi Password Tidak Sama Dengan Password Baru !!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('autentifikasi/new-password', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $pwd_baru = $this->input->post('password_baru1', true);
            if (password_verify($pwd_baru, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru Tidak Boleh Sama Dengan Password Saat Ini !!</div>');
                redirect('autentifikasi/passwordBaru');
            } else {
                //Password OK
                $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->unset_userdata('reset_email'); // Clear session email after reset

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil Diubah !!</div>');
                redirect('autentifikasi');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda Telah Logout !!</div>');
        redirect('autentifikasi');
    }

    public function blok()
    {
        $this->load->view('autentifikasi/blok');
    }

    public function gagal()
    {
        $this->load->view('autentifikasi/gagal');
    }
}
