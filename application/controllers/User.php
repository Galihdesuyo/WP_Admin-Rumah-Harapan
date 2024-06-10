<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Profile Saya';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function anggota()
    {
        $data['judul'] = 'Data User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required|min_length[15]|numeric', [
            'required' => 'NIK Harus Diisi !!',
            'min_length' => 'NIK Terlalu Pendek !!',
            'numeric' => 'Yang Anda Isi Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum Diisi !!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Belum Dipilih !!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Belum Diisi !!'
        ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email Tidak Benar !!',
            'required' => 'Email Belum Diisi !!',
            'is_unique' => 'Email Sudah Terdaftar !!'
        ]);
        $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'required|min_length[13]|numeric', [
            'required' => 'No.HP Harus Diisi !!',
            'min_length' => 'No.HP Terlalu Pendek !!',
            'numeric' => 'Yang Anda Isi Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password Belum Diisi !!',
            'matches' => 'Password Tidak Sama !!',
            'min_length' => 'Password Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');

        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/anggota', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = 'default.jpg';
            }

            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => $gambar,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->ModelUser->simpanData($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat! Akun anda berhasil dibuat.</div>');
            redirect('user/anggota');
        }
    }

    public function ubahAnggota($id)
    {
        $data['judul'] = 'Ubah Data User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserById($id);

        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required|min_length[15]|numeric', [
            'required' => 'NIK Harus Diisi !!',
            'min_length' => 'NIK Terlalu Pendek !!',
            'numeric' => 'Yang Anda Isi Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum Diisi !!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Belum Dipilih !!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Belum Diisi !!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah_anggota', $data);
            $this->load->view('templates/footer');
        } else {
            $dataUpdate = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'email' => $data['anggota']['email'],
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            // Configurasi upload
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['max_width'] = '1024';
            $config['max_height'] = '1000';
            $config['file_name'] = 'img' . time();

            $this->load->library('upload', $config);

            // Handle image upload
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $dataUpdate['image'] = $image['file_name'];
            } else {
                $dataUpdate['image'] = $data['anggota']['image'];
            }

            $this->ModelUser->updateAnggota($id, $dataUpdate);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data User Berhasil Diubah.</div>');
            redirect('user/anggota');
        }
    }

    public function hapusAnggota()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusAnggota($where);
        redirect('user/anggota');
    }

    public function bank()
    {
        $data['judul'] = 'Data Bank';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->ModelDonasi->getBank()->result_array();

        $this->form_validation->set_rules('bank', 'bank', 'required', [
            'required' => 'Nama Bank Harus Diisi !!'
        ]);
        $this->form_validation->set_rules('no_rekening', 'no_rekening', 'required', [
            'required' => 'Nomor Rekening Harus Diisi !!'
        ]);
        $this->form_validation->set_rules('pemilik', 'pemilik', 'required', [
            'required' => 'Nama Pemilik Harus Diisi !!'
        ]);

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/bank', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'bank' => $this->input->post('bank', true),
                'no_rekening' => $this->input->post('no_rekening', true),
                'pemilik' => $this->input->post('pemilik', true),
                'image' => $gambar
            ];

            $this->ModelDonasi->simpanBank($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Bank Berhasil Ditambahkan.</div>');
            redirect('user/bank');
        }
    }

    public function ubahBank()
    {
        $data['judul'] = 'Ubah Data Bank';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->ModelDonasi->bankWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('bank', 'Nama Bank', 'required|min_length[2]', [
            'required' => 'Nama Bank Harus Diisi !!',
            'min_length' => 'Nama Bank Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('no_rekening', 'Nomor Rekening', 'required|min_length[5]|numeric', [
            'required' => 'Nomor Rekening Harus Diisi !!',
            'min_length' => 'Nomor Rekening Terlalu Pendek !!',
            'numeric' => 'Yang Anda Isi Bukan Angka !!'
        ]);
        $this->form_validation->set_rules('pemilik', 'Nama Pemilik', 'required|min_length[2]', [
            'required' => 'Nama Pemilik Harus Diisi !!',
            'min_length' => 'Nama Pemilik Terlalu Pendek !!'
        ]);

        // Konfigurasi Sebelum Gambar Diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        // Memuat atau Memanggil Library Upload
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah_bank', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                if ($this->input->post('old_pict')) {
                    unlink('./assets/img/upload/' . $this->input->post('old_pict'));
                }
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict');
            }

            $data = [
                'bank' => $this->input->post('bank', true),
                'no_rekening' => $this->input->post('no_rekening', true),
                'pemilik' => $this->input->post('pemilik', true),
                'image' => $gambar
            ];

            $this->ModelDonasi->updateBank(['id' => $this->input->post('id')], $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Bank Berhasil Diubah.</div>');
            redirect('user/bank');
        }
    }

    public function hapusBank()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelDonasi->hapusBank($where);
        redirect('user/bank');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong !!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil Diubah. </div>');
            redirect('user');
        }
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
            'required' => 'Password Saat Ini Harus Diisi !!'
        ]);

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
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-password', $data);
            $this->load->view('templates/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat Ini Salah !!</div>');
                redirect('user/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru Tidak Boleh Sama Dengan Password Saat Ini !!</div>');
                    redirect('user/ubahPassword');
                } else {
                    //Password OK
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil Diubah !!</div>');
                    redirect('user/ubahPassword');
                }
            }
        }
    }
}
