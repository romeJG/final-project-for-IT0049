<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getAdminName($email)
    {
        //Gets the admin name if there is a match on $email on the admin table
        $this->db->select('name');
        $this->db->where('email', $email);
        $adminquery = $this->db->get('admins');
        $result = $adminquery->result();
        $name = '';
        foreach ($result as $data) {
            $name = $data->name;
        }
        return $name;
    }


    public function getAdmin($email)
    {
        $where = array('email' => $email);
        $query = $this->db->get_where('admins', $where);
        $result = $query->row();
        return $result;
    }

    // ooooo     ooo                                           oooooooooooo                                       .    o8o                                 
    // `888'     `8'                                           `888'     `8                                     .o8    `"'                                 
    //  888       8   .oooo.o  .ooooo.  oooo d8b  .oooo.o       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //  888       8  d88(  "8 d88' `88b `888""8P d88(  "8       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  888       8  `"Y88b.  888ooo888  888     `"Y88b.        888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //  `88.    .8'  o.  )88b 888    .o  888     o.  )88b       888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    //    `YbodP'    8""888P' `Y8bod8P' d888b    8""888P'      o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 



    function getUsers()
    {
        return $this->db->get('users')->result();
    }

    public function getUser($id)
    {
        $where = array('id' => $id);
        $query = $this->db->get_where('users', $where);
        $result = $query->row();
        return $result;
    }

    // Update a single user
    public function editUser($id, $data)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->update('users', $data);
    }

    // Delete a single user
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('users');
    }



    // ooooo     .                                             oooooooooooo                                       .    o8o                                 
    // `888'   .o8                                             `888'     `8                                     .o8    `"'                                 
    //  888  .o888oo  .ooooo.  ooo. .oo.  .oo.    .oooo.o       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //  888    888   d88' `88b `888P"Y88bP"Y88b  d88(  "8       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  888    888   888ooo888  888   888   888  `"Y88b.        888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //  888    888 . 888    .o  888   888   888  o.  )88b       888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    // o888o   "888" `Y8bod8P' o888o o888o o888o 8""888P'      o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 




    //gets the full table
    public function getItems($show)
    {
        if ($show == "all") {
            return $this->db->get('items')->result();
        } else if ($show == "active") {
            $where = array('is_active' => 1);
            return $this->db->get_where('items', $where)->result();
        } else if ($show == "inactive") {
            $where = array('is_active' => 0);
            return $this->db->get_where('items', $where)->result();
        } else {
            return $this->db->get('items')->result();
        }
    }

    public function saveItem($data)
    {
        $this->db->insert('items', $data);
    }

    public function getItem($id)
    {
        $where = array('id' => $id);
        $query = $this->db->get_where('items', $where);
        $result = $query->row();
        return $result;
    }
    // Update a single item
    public function editItem($id, $data)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->update('items', $data);
    }
    public function deleteItem($id)
    {
        //deletes the item that has the id $id
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('items');
    }
}
