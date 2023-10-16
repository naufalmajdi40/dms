<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Krs_model
class Device_model extends CI_Model
{
    // Property yang bersifat public
    public $table = 'device_list';
    public $id = 'machine_code';
    public $user = 'username';
    public $no = 'no';
    public $order = 'DESC';


    
	// Konstrutor    
    function __construct()
    {
        parent::__construct();
} 

    function json() {       
		// $username    = $this->session->userdata['username'];
		$this->datatables->select("data.no,data.machine_code,data.relay_id,data.lokasi,data.status,data.nama_file,data.waktu");
        $this->datatables->from('data');
        $this->datatables->add_column('action', '<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>');
       

      
        return $this->datatables->generate();
    }
   
   
   // Menampilkan semua data 
function get_all()
    {
    	$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('id', 'desc');
		return $this->db->get()->result();
    }

      function get_data($user)
    {
    	

        $this->db->select('*');
		$this->db->from('device_user');
	    $this->db->where('device_user.username', $user);
	    $this->db->join('device_list','device_list.machine_code = device_user.machine_code');
        $this->db->join('data','data.machine_code = device_list.machine_code');
		$data = $this->db->get()->result();
		return $data;
    }

    function get_map($user)
    {

        $this->db->select('*');
		$this->db->from('device_list');
	    $this->db->where('device_user.username', $user);
                                                             // $this->db->where('data.machine_code', 'device_user.machine_code');
	    $this->db->join('device_user','device_user.machine_code = device_list.machine_code');
        // $this->db->join('data','device_list.machine_code = data.machine_code');
      
        
		$data = $this->db->get()->result();
        //$data = $this->db->count_all_results();
		return $data;
    }

    // Menampilkan semua data berdasarkan id-nya
    function get_by_id($user)
    {
        $this->db->where($this->user, $user);
        $this->db->order_by('id', "desc");
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
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // Menghapus data kedalam database
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_device(){
        $qry ="SELECT * from device_list";
        return $this->db->query($qry);
    }
}
/* End of file Krs_model.php */
/* Location: ./application/models/Krs_model.php */
/* Please DO NOT modify this information : */