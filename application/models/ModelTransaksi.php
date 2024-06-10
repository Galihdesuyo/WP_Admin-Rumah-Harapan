<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTransaksi extends CI_Model
{
    public function getData($table)
    {
        return $this->db->get($table)->row();
    }

    public function getDataWhere($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function getOrderByLimit($table, $order, $limit)
    {
        $this->db->order_by($order, 'desc');
        $this->db->limit($limit);
        return $this->db->get($table);
    }

    public function joinOrder($where)
    {
        $this->db->select('*');
        $this->db->from('transaksi tr');
        $this->db->join('detail_transaksi d', 'd.id_transaksi=tr.id_transaksi');
        $this->db->join('donasi do ', 'do.id=d.id_donasi');
        $this->db->where($where);
        return $this->db->get();
    }

    public function simpanDetail($where = null)
    {
        $sql = "INSERT INTO detail_transaksi (id_transaksi,id_donasi) 
        SELECT transaksi.id_transaksi,temp.id_donasi 
        FROM transaksi, temp 
        WHERE temp.id_user=transaksi.id_user 
        AND transaksi.id_user='$where'";
        $this->db->query($sql);
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($where)
    {
        //Query mencari record berdasarkan ID-nya
        $this->db->limit(1);
        return $this->db->get('donasi', $where);
    }

    public function kosongkanData($table)
    {
        return $this->db->truncate($table);
    }

    public function createTemp()
    {
        $this->db->query('CREATE TABLE IF NOT EXISTS temp(id_transaksi varchar(12), tgl_transaksi DATETIME, email_user varchar(128), id_donasi int)');
    }

    public function selectJoin()
    {
        $this->db->select('*');
        $this->db->from('transaski');
        $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi=transaksi.id_transaksi');
        $this->db->join('donasi', 'detail_transaksi.id_donasi=donasi.id');
        return $this->db->get();
    }

    public function showtemp($where)
    {
        return $this->db->get('temp', $where);
    }

    public function kodeOtomatis($tabel, $key)
    {
        $this->db->select('right(' . $key . ',3) as kode', false);
        $this->db->order_by($key, 'desc');
        $this->db->limit(1);
        $query = $this->db->get($tabel);
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('dmY') . $kodemax;
        return $kodejadi;
    }

    public function simpanTransaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function selectTransaksi($table, $where)
    {
        return $this->db->get($table, $where);
    }

    public function updateTransaksi($data, $where)
    {
        $this->db->update('transaksi', $data, $where);
    }

    public function joinData()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_transaksi', 'detail_transaksi.no_transaksi=transaksi.no_transaksi', 'Right');

        return $this->db->get()->result_array();
    }

    public function simpanDetailTransaksi($idtransaksi, $notransaksi)
    {
        $sql = "INSERT INTO detail_transaksi (no_transaksi,id_donasi) SELECT transaksi.no_transaksi , detail_transaksi.id_donasi FROM transaksi, detail_transaksi WHERE detail_transaksi.id_transaksi=$idtransaksi AND transaksi.no_transaksi=$notransaksi";
        $this->db->query($sql);
    }
}
