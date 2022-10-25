<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pelanggan extends CI_Model
{
    function getDataPelanggan()
    {
        $query = $this->db->get('pelanggan');
        return $query->result();
    }
    function getDataPelangganDetail($kode_pelanggan)
    {
        $this->db->where('kode_pelanggan', $kode_pelanggan);
        $query = $this->db->get('pelanggan');
        return $query->row();
    }
    function insertDataPelanggan($data)
    {
        $this->db->insert('pelanggan', $data);
    }
    function updateDataPelanggan($kode_pelanggan, $data)
    {
        $this->db->where('kode_pelanggan', $kode_pelanggan);
        $this->db->update('pelanggan', $data);
    }
    function deleteDataPelanggan($kode_pelanggan)
    {
        $this->db->where('kode_pelanggan', $kode_pelanggan);
        $this->db->delete('pelanggan');
    }
}
