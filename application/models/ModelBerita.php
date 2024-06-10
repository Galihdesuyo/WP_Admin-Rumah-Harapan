<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBerita extends CI_Model
{

    //Manajemen Berita
    public function getBerita()
    {
        return $this->db->get('berita');
    }

    public function beritaWhere($where)
    {
        return $this->db->get_where('berita', $where);
    }

    public function getBeritaById($id)
    {
        return $this->db->get_where('berita', ['id' => $id])->row_array();
    }

    public function simpanBerita($data = null)
    {
        $this->db->insert('berita', $data);
    }

    public function updateBerita($data = null, $where = null)
    {
        $this->db->update('berita', $data, $where);
    }

    public function hapusBerita($where = null)
    {
        $this->db->delete('berita', $where);
    }
}
