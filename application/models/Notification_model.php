<?php
/******************************************************/
/* File        : Users_model.php                      */
/* Lokasi File : ./application/models/Users_model.php */
/*----------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Users_model
class Notification_model extends CI_Model
{
   
    // Property yang bersifat public   
    public $table = 'notif';
    public $id = 'chat_id';
    public $order = 'DESC';
    
   // Konstrutor   
   function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama users
    function json($userId) {
        // $username  = $this->session->userdata['username'];	
        $this->datatables->select('notif.id,notif.chat_id,notif.name,notif.machine_code');
        $this->datatables->from('notif'); 
        $this->datatables->where('notif.machine_code',$userId);
        $this->datatables->join('device_user', 'notif.machine_code = device_user.machine_code'); 	
        $this->datatables->add_column('action', anchor(site_url('notification/delete/$1'),'<button type="button" class="btn btn-warning"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>'), 'chat_id');
        return $this->datatables->generate();
    }

   
   // Menampilkan semua data 
   function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // Menampilkan semua data berdasarkan id-nya
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // menampilkan jumlah data	
    function total_rows($q = NULL) {
        $this->db->like('chat_id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('machine_code', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('chat_id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('machine_code', $q);
		$this->db->from($this->table);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }    

    // Merubah data kedalam database
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

      function delete($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Please DO NOT modify this information : */