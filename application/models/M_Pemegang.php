<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pemegang extends CI_Model
{
    function getDataPemegangKendaraan()
    {
        $query = $this->db->get('pemegang_kendaraan');
        return $query->result();
    }
    function getDataPemegangMobil()
    {
        $query = $this->db->get_where('pemegang_kendaraan', array('jenis_kendaraan' => 'mobil'));
        return $query->result();
    }
    function getDataPemegangMotor()
    {
        $query = $this->db->get_where('pemegang_kendaraan', array('jenis_kendaraan' => 'motor'));
        return $query->result();
    }
    function insertDataPemegang($data)
    {
        $this->db->insert('pemegang_kendaraan', $data);
    }
    function getPemegangDetail($id)
    {
        $this->db->where('kode_pemegang', $id);
        $query = $this->db->get('pemegang_kendaraan');
        return $query->row();
    }
    function updateDataPemegang($id, $data)
    {
        $this->db->where('kode_pemegang', $id);
        $this->db->update('pemegang_kendaraan', $data);
    }
    function deleteDataPemegang($id)
    {
        $this->db->where('kode_pemegang', $id);
        $this->db->delete('pemegang_kendaraan');
    }
    // function getDataUser()
    // {
    //     $query = $this->db->get('pemegang_kendaraan');
    //     return $query->result();
    // }
}
