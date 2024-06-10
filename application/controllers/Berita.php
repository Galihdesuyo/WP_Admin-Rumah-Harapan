<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Berita Terkini';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->ModelBerita->getBerita()->result_array();

        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|min_length[3]', [
            'required' => 'Judul Berita Harus Diisi !!',
            'min_length' => 'Judul Berita Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[3]', [
            'required' => 'Deskripsi Harus Diisi !!',
            'min_length' => 'Deskripsi Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|min_length[3]', [
            'required' => 'Nama Penulis Harus Diisi !!',
            'min_length' => 'Nama Penulis Terlalu Pendek !!'
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
            $this->load->view('admin/berita', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $tgl_posting = $this->input->post('tgl_posting', true);

            $data = [
                'judul_berita' => $this->input->post('judul_berita', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'penulis' => $this->input->post('penulis', true),
                'tgl_posting' => $tgl_posting,
                'image' => $gambar
            ];

            $this->ModelBerita->simpanBerita($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berita Baru Berhasil Ditambahkan.</div>');
            redirect('berita');
        }
    }

    public function ubahBerita()
    {
        $data['judul'] = 'Ubah Data Berita';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->ModelBerita->beritaWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|min_length[3]', [
            'required' => 'Judul Berita Harus Diisi !!',
            'min_length' => 'Judul Berita Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[3]', [
            'required' => 'Deskripsi Harus Diisi !!',
            'min_length' => 'Deskripsi Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|min_length[3]', [
            'required' => 'Nama Penulis Harus Diisi !!',
            'min_length' => 'Nama Penulis Terlalu Pendek !!'
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
            $this->load->view('admin/ubah_berita', $data);
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

            $tgl_posting = $this->input->post('tgl_posting', true);

            $data = [
                'judul_berita' => $this->input->post('judul_berita', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'penulis' => $this->input->post('penulis', true),
                'tgl_posting' => $tgl_posting,
                'image' => $gambar
            ];

            $this->ModelBerita->updateBerita(['id' => $this->input->post('id')], $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Berita Berhasil Diubah.</div>');
            redirect('berita');
        }
    }

    public function hapusBerita()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBerita->hapusBerita($where);
        redirect('berita');
    }
}
