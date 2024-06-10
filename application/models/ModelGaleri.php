<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelGaleri extends CI_Model
{

    //Manajemen Galeri
    public function getGaleri()
    {
        return $this->db->get('galeri');
    }

    public function galeriWhere($where)
    {
        return $this->db->get_where('galeri', $where);
    }

    public function getGaleriById($id)
    {
        return $this->db->get_where('galeri', ['id' => $id])->row_array();
    }

    public function simpanGaleri($data = null)
    {
        $this->db->insert('galeri', $data);
    }

    public function updateGaleri($data = null, $where = null)
    {
        $this->db->update('galeri', $data, $where);
    }

    public function hapusGaleri($where = null)
    {
        $this->db->delete('galeri', $where);
    }
}
