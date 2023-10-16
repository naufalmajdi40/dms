<?php
/******************************************************/
/* File        : Users_model.php                      */
/* Lokasi File : ./application/models/Users_model.php */
/*----------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Users_model
class Users_model extends CI_Model
{
   
    // Property yang bersifat public   
    public $table = 'users';
    public $id = 'username';
    public $order = 'DESC';
    
   // Konstrutor   
   function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama users
    function json() {
        $username  = $this->session->userdata['username'];	
        $this->datatables->select('users.username, users.nama, users.kebun,users.password,users.email, users.level, users.blokir, users.id_sessions');
        $this->datatables->from('users');  
		$this->datatables->where('users.username = '. $username);	
		// $this->datatables->where('users.username = tanaman.id_product');	
        $this->datatables->add_column('action', anchor(site_url('users/update/$1'),'<button type="button" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i></button>'), 'username');
        return $this->datatables->generate();
    }

        function jsonAdmin() {
        $username  = $this->session->userdata['username'];	
        $this->datatables->select('users.username, users.nama, users.kebun,users.password,users.email, users.level, users.blokir, users.id_sessions');
        $this->datatables->from('users');  
		// $this->datatables->where('users.username = '. $username);	
		// $this->datatables->where('users.username = tanaman.id_product');	
        $this->datatables->add_column('action', anchor(site_url('admin_users/update/$1'),'<button type="button" class="btn btn-warning"><i class="fas fa-edit" aria-hidden="true"></i></button>')."  ".anchor(site_url('admin_users/delete/$1'),'<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'username');
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
        $this->db->like('username', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('kebun', $q);
		$this->db->or_like('password', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('level', $q);
		$this->db->or_like('blokir', $q);
		$this->db->or_like('id_sessions', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('username', $q);
		$this->db->or_like('nama', $q);
        $this->db->or_like('kebun', $q);
		$this->db->or_like('password', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('level', $q);
		$this->db->or_like('blokir', $q);
		$this->db->or_like('id_sessions', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }    

    // Merubah data kedalam database
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

        function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Please DO NOT modify this information : */