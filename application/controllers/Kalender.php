<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Kalender';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kalender', $data);
        $this->load->view('templates/footer');
    }
}
