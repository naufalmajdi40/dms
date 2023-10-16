<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Mahasiswa_model
class Notifikasi_model extends CI_Model
{
	// Property yang bersifat public   
    public $table = 'notifikasi';
    public $id = 'id_product';
    public $order = 'DESC';
    
	// Konstrutor    
    function __construct()
    {
        parent::__construct();
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
        $this->db->like('id_product', $q);
        $this->db->or_like('id_product', $q);
        $this->db->or_like('latitude', $q);
        $this->db->or_like('longitude', $q);
        $this->db->or_like('chat_id', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('status', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_product', $q);
        $this->db->or_like('id_product', $q);
        $this->db->or_like('latitude', $q);
        $this->db->or_like('longitude', $q);
        $this->db->or_like('chat_id', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('status', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // Merubah data kedalam database
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

   

}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */
/* Please DO NOT modify this information : */