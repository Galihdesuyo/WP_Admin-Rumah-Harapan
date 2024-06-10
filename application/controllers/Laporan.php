<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function laporan_donasi()
    {
        $data['judul'] = 'Laporan Program Donasi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->ModelDonasi->getDonasi()->result_array();
        $data['kategori'] = $this->ModelDonasi->getKategori()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('donasi/laporan_donasi', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_donasi()
    {
        $data['donasi'] = $this->ModelDonasi->getDonasi()->result_array();
        $data['kategori'] = $this->ModelDonasi->getKategori()->result_array();

        $this->load->view('donasi/laporan_print_donasi', $data);
    }

    public function laporan_donasi_pdf()
    {
        $data['donasi'] = $this->ModelDonasi->getDonasi()->result_array();
        $data['kategori'] = $this->ModelDonasi->getKategori()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/rumah-harapan/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('donasi/laporan_pdf_donasi', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_program_donasi.pdf", array('Attachment' =>
        0));
    }

    public function export_excel_donasi()
    {
        $data = array('title' => 'Laporan Program Donasi', 'donasi' => $this->ModelDonasi->getDonasi()->result_array());
        $data['kategori'] = $this->ModelDonasi->getKategori()->result_array();
        $this->load->view('donasi/export_excel_donasi', $data);
    }

    public function laporan_anggota()
    {
        $data['judul'] = 'Laporan Data User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/laporan_anggota', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_anggota()
    {
        $data['user'] = $this->ModelUser->getUserLimit()->result_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();

        $this->load->view('anggota/laporan_print_anggota', $data);
    }

    public function laporan_anggota_pdf()
    {
        $data['user'] = $this->ModelUser->getUserLimit()->result_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/rumah-harapan/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('anggota/laporan_pdf_anggota', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_user.pdf", array('Attachment' =>
        0));
        // nama file pdf yang di hasilkan
    }

    public function export_excel_anggota()
    {
        $data = array('title' => 'Laporan Data User', 'user' => $this->ModelUser->getUserLimit()->result_array());
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $this->load->view('anggota/export_excel_anggota', $data);
    }

    public function laporan_transaksi()
    {
        $data['judul'] = 'Laporan Data Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->db->query("SELECT * FROM transaksi t, detail_transaksi dt, donasi d, user u WHERE dt.id_donasi = d.id AND t.id_user = u.id AND t.no_transaksi = dt.no_transaksi")->result_array();
        $data['bank'] = $this->ModelDonasi->getBank()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/laporan-transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_transaksi()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->db->query("SELECT * FROM transaksi t, detail_transaksi dt, donasi d, user u WHERE dt.id_donasi = d.id AND t.id_user = u.id AND t.no_transaksi = dt.no_transaksi")->result_array();
        $data['bank'] = $this->ModelDonasi->getBank()->result_array();
        $this->load->view('transaksi/laporan-print-transaksi', $data);
    }

    public function laporan_transaksi_pdf()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->db->query("SELECT * FROM transaksi t, detail_transaksi dt, donasi d, user u WHERE dt.id_donasi = d.id AND t.id_user = u.id AND t.no_transaksi = dt.no_transaksi")->result_array();
        $data['bank'] = $this->ModelDonasi->getBank()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/rumah-harapan/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('transaksi/laporan-pdf-transaksi', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; // tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        // Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_transaksi.pdf", array('Attachment' => 0)); // nama file pdf yang dihasilkan
    }

    public function export_excel_transaksi()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bank'] = $this->ModelDonasi->getBank()->result_array();
        $data = array(
            'title' => 'Laporan Data Transaksi Donasi',
            'laporan' => $this->db->query("SELECT * FROM transaksi t, detail_transaksi dt, donasi d, user u WHERE dt.id_donasi = d.id AND t.id_user = u.id AND t.no_transaksi = dt.no_transaksi")->result_array()
        );
        $this->load->view('transaksi/export-excel-transaksi', $data);
    }
}
