<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
    }

    public function index()
    {
        $data['judul'] = "Data Transaksi";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->ModelTransaksi->joinData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/data-transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function transaksiDetail()
    {
        $id_transaksi = $this->uri->segment(3);
        $data['judul'] = "Detail Transaksi";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['agt_transaksi'] = $this->db->query("
            SELECT * 
            FROM temp t, user u 
            WHERE t.id_user = u.id AND t.id_transaksi = '$id_transaksi'
        ")->result_array();

        $data['detail'] = $this->db->query("
            SELECT id_donasi, judul_donasi, id_user, jumlah_donasi, tgl_transaksi 
            FROM detail_transaksi dt, donasi d 
            WHERE dt.id_donasi = d.id AND dt.id_transaksi = '$id_transaksi'
        ")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/transaksi-detail', $data);
        $this->load->view('templates/footer');
    }

    public function pembayaran()
    {
        $data['judul'] = "Data Pembayaran";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->query("SELECT * FROM temp WHERE id_user = " . $this->session->userdata('id_user'))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function hapusPembayaran()
    {
        $id_donasi = $this->uri->segment(3);
        $id_user = $this->session->userdata('id_user');

        $this->ModelTransaksi->deleteData(['id_donasi' => $id_donasi], 'temp');
        $kosong = $this->db->query("SELECT * FROM temp WHERE id_user='$id_user'")->num_rows();

        if ($kosong < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tidak Ada Pembayaran Yang Sedang Berlangsung</div>');
            redirect(base_url('transaksi/pembayaran'));
        } else {
            redirect(base_url('transaksi/pembayaran'));
        }
    }

    public function transaksiSelesai()
    {
        $id_user = $this->session->userdata('id_user');

        // Fetch temp data for the user
        $temp_data = $this->db->get_where('temp', ['id_user' => $id_user])->result_array();

        // Update donasi table
        $this->db->query("UPDATE donasi, temp SET donasi.ditransaksi = donasi.ditransaksi + temp.jumlah_donasi, donasi.dana_dibutuhkan = donasi.dana_dibutuhkan - temp.jumlah_donasi WHERE donasi.id = temp.id_donasi AND temp.id_user = $id_user");

        foreach ($temp_data as $temp) {
            // Insert into transaksi table
            $id_transaksi = $this->ModelTransaksi->kodeOtomatis('transaksi', 'id_transaksi');
            $tgl_transaksi = date('Y-m-d H:i:s');

            $isitransaksi = [
                'id_transaksi' => $id_transaksi,
                'tgl_transaksi' => $tgl_transaksi,
                'id_user' => $id_user,
                'id_donasi' => $temp['id_donasi'],
                'jumlah_donasi' => $temp['jumlah_donasi'],
                'id_bank' => $temp['id_bank']
            ];

            $this->ModelTransaksi->insertData('transaksi', $isitransaksi);
        }

        $this->ModelTransaksi->simpanDetail($id_user);

        $this->ModelTransaksi->kosongkanData('temp', ['id_user' => $id_user]);

        redirect(base_url('transaksi/pembayaran'));
    }
}
