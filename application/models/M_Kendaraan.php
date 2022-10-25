<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kendaraan extends CI_Model
{
    function getDataKendaraan()
    {
        $query = $this->db->get('kendaraan');
        return $query->result();
    }
    function insertDataKendaraan($data)
    {
        $this->db->insert('kendaraan', $data);
    }
    function getDataKendaraanDetail($no_regis)
    {
        $this->db->where('no_regis', $no_regis);
        $query = $this->db->get('kendaraan');
        return $query->row();
    }
    function updateDataKendaraan($no_regis, $data)
    {
        $this->db->where('no_regis', $no_regis);
        $this->db->update('kendaraan', $data);
    }
    function deleteDataKendaraan($no_regis)
    {
        $this->db->where('no_regis', $no_regis);
        $this->db->delete('kendaraan');
    }
    function getDataUser()
    {
        $query = $this->db->get('kendaraan');
        return $query->result();
    }
}
