<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getUserWithEmail($email)
    {
        $where = array('email' => $email);
        $query = $this->db->get_where('users', $where);
        $result = $query->row();
        return $result;
    }
    function editUser($id, $data)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->update('users', $data);
    }
}
