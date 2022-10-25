<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Supplier extends CI_Model
{
    function getDataSupplier()
    {
        $query = $this->db->get('supplier');
        return $query->result();
    }
    function getDataSupplierNoAcc()
    {
        $this->db->where('id_user', '');
        $query = $this->db->get('supplier');
        return $query->result();
    }
    function getDataSupplierDetail($kode_supplier)
    {
        $this->db->where('kode_supplier', $kode_supplier);
        $query = $this->db->get('supplier');
        return $query->row();
    }
    function insertDataSupplier($data)
    {
        $this->db->insert('supplier', $data);
    }
    function updateDataSupplier($kode_supplier, $data)
    {
        $this->db->where('kode_supplier', $kode_supplier);
        $this->db->update('supplier', $data);
    }
    function deleteDataSupplier($kode_supplier)
    {
        $this->db->where('kode_supplier', $kode_supplier);
        $this->db->delete('supplier');
    }
    function getListBarang($kode_supplier)
    {
        $this->db->select('*');
        $this->db->from('list_barang_supplier');
        $this->db->where('kode_supplier', $kode_supplier);
        return $this->db->get();
    }
}
