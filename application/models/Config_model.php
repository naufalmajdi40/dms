<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Krs_model
class Config_model extends CI_Model
{
    // Property yang bersifat public
    public $table = 'im_config';
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
       return $this->db->get($this->table)->row();
   }
   function get_all_selected(){
        $qry="select *from im_com left join im_config on im_com.id_com = im_config.com";
        return $this->db->query($qry);
   }
   function save_config($data){
    return $this->db->update($this->table, $data);   
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