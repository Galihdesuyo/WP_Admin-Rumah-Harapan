<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array(); // Mengembalikan array tunggal
    }

    public function getUserByRole($role_id, $limit = 6)
    {
        $this->db->where('role_id', $role_id);
        $this->db->limit($limit);
        return $this->db->get('user');
    }

    public function getRole()
    {
        return $this->db->get('role');
    }

    //Manajemen Data Anggota
    public function simpanAnggota($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function hapusAnggota($where = null)
    {
        $this->db->delete('user', $where);
    }

    public function updateAnggota($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
