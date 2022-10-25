<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengaturan extends CI_Model
{
    function getDataCompany()
    {
        $query = $this->db->get('company_info');
        return $query->result();
    }
}
