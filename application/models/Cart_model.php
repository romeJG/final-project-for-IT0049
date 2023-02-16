<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    // ooooo     .                                             oooooooooooo                                       .    o8o                                 
    // `888'   .o8                                             `888'     `8                                     .o8    `"'                                 
    //  888  .o888oo  .ooooo.  ooo. .oo.  .oo.    .oooo.o       888         oooo  oooo  ooo. .oo.    .ooooo.  .o888oo oooo   .ooooo.  ooo. .oo.    .oooo.o 
    //  888    888   d88' `88b `888P"Y88bP"Y88b  d88(  "8       888oooo8    `888  `888  `888P"Y88b  d88' `"Y8   888   `888  d88' `88b `888P"Y88b  d88(  "8 
    //  888    888   888ooo888  888   888   888  `"Y88b.        888    "     888   888   888   888  888         888    888  888   888  888   888  `"Y88b.  
    //  888    888 . 888    .o  888   888   888  o.  )88b       888          888   888   888   888  888   .o8   888 .  888  888   888  888   888  o.  )88b 
    // o888o   "888" `Y8bod8P' o888o o888o o888o 8""888P'      o888o         `V88V"V8P' o888o o888o `Y8bod8P'   "888" o888o `Y8bod8P' o888o o888o 8""888P' 

    //gets the cart items
    public function getCartItems($user_id)
    {
        $where = array('user_id' => $user_id);
        return $this->db->get_where('cart', $where)->result();
    }
    public function getItem($id)
    {
        $where = array('id' => $id);
        $query = $this->db->get_where('items', $where);
        $result = $query->row();
        return $result;
    }
    public function deleteItemFromCart($cart_item_id)
    {
        //deletes the item that has the same cart_item id
        $where = array('cart_item_id' => $cart_item_id);
        $this->db->where($where);
        $this->db->delete('cart');
    }
    public function deleteAllCart($user_id)
    {
        $where = array('user_id' => $user_id);
        $this->db->where($where);
        $this->db->delete('cart');
    }
    public function insertOrder($data)
    {
        $this->db->insert('orders', $data);
    }
}
