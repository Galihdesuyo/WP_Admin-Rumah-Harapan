<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Galeri';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['galeri'] = $this->ModelGaleri->getGaleri()->result_array();

        $this->form_validation->set_rules('judul_galeri', 'Judul Galeri', 'required|min_length[3]', [
            'required' => 'Judul Galeri Harus Diisi !!',
            'min_length' => 'Judul Galeri Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[5]', [
            'required' => 'Deskripsi Harus Diisi !!',
            'min_length' => 'Deskripsi Terlalu Pendek !!'
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
            $this->load->view('admin/galeri', $data);
            $this->load->view('templates/footer');
        } else {
            $image = [];
            for ($i = 1; $i <= 3; $i++) {
                if ($this->upload->do_upload('image_' . $i)) {
                    $image['image_' . $i] = $this->upload->data('file_name');
                }
            }

            $data = [
                'judul_galeri' => $this->input->post('judul_galeri', true),
                'text_1' => $this->input->post('deskripsi', true),
                'image_1' => $image['image_1'],
                'image_2' => $image['image_2'],
                'image_3' => $image['image_3']
            ];

            $this->ModelGaleri->simpanGaleri($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Galeri Baru Berhasil Ditambahkan.</div>');
            redirect('galeri');
        }
    }

    public function ubahGaleri()
    {
        $data['judul'] = 'Ubah Data Galeri';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['galeri'] = $this->ModelGaleri->galeriWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('judul_galeri', 'Judul Galeri', 'required|min_length[3]', [
            'required' => 'Judul Galeri Harus Diisi !!',
            'min_length' => 'Judul Galeri Terlalu Pendek !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[5]', [
            'required' => 'Deskripsi Harus Diisi !!',
            'min_length' => 'Deskripsi Terlalu Pendek !!'
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
            $this->load->view('admin/ubah_galeri', $data);
            $this->load->view('templates/footer');
        } else {
            $image = [];
            for ($i = 1; $i <= 3; $i++) {
                if ($this->upload->do_upload('image_' . $i)) {
                    $image['image_' . $i] = $this->upload->data('file_name');
                    if ($this->input->post('old_pict')) {
                        unlink('./assets/img/upload/' . $this->input->post('old_pict'));
                    }
                    $image['file_name'];
                } else {
                    $image = $this->input->post('old_pict');
                }
            }

            $data = [
                'judul_galeri' => $this->input->post('judul_galeri', true),
                'deskripsi' => $this->input->post('text_1', true),
                'image_1' => $image['image_1'],
                'image_2' => $image['image_2'],
                'image_3' => $image['image_3']
            ];

            $this->ModelGaleri->updateGaleri(['id' => $this->input->post('id')], $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Galeri Berhasil Diubah.</div>');
            redirect('galeri');
        }
    }

    public function hapusGaleri()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelGaleri->hapusGaleri($where);
        redirect('galeri');
    }
}
