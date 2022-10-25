<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Service extends CI_Model
{
    function getDataService()
    {
        $query = $this->db->get('service');
        return $query->result();
    }
    function getDataServiceMobil()
    {
        $query = $this->db->get_where('service', array('jenis_kendaraan' => 'mobil'));
        return $query->result();
    }
    function getDataServiceMotor()
    {
        $query = $this->db->get_where('service', array('jenis_kendaraan' => 'motor'));
        return $query->result();
    }
    function getDataServiceDetail($kode_service)
    {
        $this->db->where('kode_service', $kode_service);
        $query = $this->db->get('service');
        return $query->row();
    }
    function insertDataService($data)
    {
        $this->db->insert('service', $data);
    }
    function updateDataService($kode_service, $data)
    {
        $this->db->where('kode_service', $kode_service);
        $this->db->update('service', $data);
    }
    function deleteDataService($kode_service)
    {
        $this->db->where('kode_service', $kode_service);
        $this->db->delete('service');
    }
    function exportExcel($data)
    {
        return $this->db->insert('service', $data);
    }
}
