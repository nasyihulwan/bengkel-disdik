<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    function getDataUser()
    {
        $this->db->select('user.id as iduser,nama,image,role as role_name,email,no_telp,alamat,date_created,user_role.id as id_role,user_role.role,role_id');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        // $this->db->where('user.role_id', 'user_role.id');
        return $this->db->get();
    }
    function getRole($role_id)
    {
        $this->db->select('role');
        $this->db->from('user_role');
        $this->db->where('id', $role_id);
        return $this->db->get()->row_array();
    }
}
