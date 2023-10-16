<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Krs_model
class Com_model extends CI_Model
{
    // Property yang bersifat public
    public $table = 'im_mon_com';
    public $id = 'machine_code';
    // public $order = 'ASC';
    
	// Konstrutor    
    function __construct()
    {
        parent::__construct();
    }
   
   // Menampilkan semua data 
   function get_all()
   {
    $qry="SELECT * from im_mon_com";
    return $this->db->query($qry);
   }

    // Menampilkan semua data berdasarkan id-nya
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
   
	
    // Menambahkan data kedalam database
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // Merubah data kedalam database
    function update($id, $data)
    {
    
        $this->db->update($this->table, $data);
    }

    // Menghapus data kedalam database
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Krs_model.php */
/* Location: ./application/models/Krs_model.php */
/* Please DO NOT modify this information : */
?>