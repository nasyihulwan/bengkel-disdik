<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Barang extends CI_Model
{
    function getDataBarang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }
    function getDataBarangMobil()
    {
        $query = $this->db->get_where('barang', array('jenis_kendaraan' => 'mobil'));
        return $query->result();
    }
    function getDataBarangMotor()
    {
        $query = $this->db->get_where('barang', array('jenis_kendaraan' => 'motor'));
        return $query->result();
    }
    function getDataBarangDetail($kode_barang)
    {
        $this->db->where('kode_barang', $kode_barang);
        $query = $this->db->get('barang');
        return $query->row();
    }
    function insertDataBarang($data)
    {
        $this->db->insert('barang', $data);
    }
    function updateDataBarang($kode_barang, $data)
    {
        $this->db->where('kode_barang', $kode_barang);
        $this->db->update('barang', $data);
    }
    function deleteDataBarang($kode_barang)
    {
        $this->db->where('kode_barang', $kode_barang);
        $this->db->delete('barang');
    }
}
