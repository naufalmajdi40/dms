<?php

/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Admin
class Grafik extends CI_Controller {
	
	// Konstrutor 
	function __construct() {
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->model('Data_model');
		$this->load->model('Device_model');
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	}
	
	// Fungsi untuk menampilkan halaman utama admin
	public function index() {
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
	//	$deviceUse = $this->Device_model->get_by_id($this->session->userdata['username']);
		$data = array(	
			'username' => $row->username,
			'nama'     => $row->nama,
			'kebun'     => $row->kebun,
			'email'    => $row->email,
			'level'    => $row->level,
		
		);
	
		// $id_product=$deviceUse->machine_code;
		$user=$row->username;
		
			$dataGrafik=array(

			'grafik_data'=>$this->baca_data($user));

		$this->load->view('grafik',$dataGrafik); // Menampilkan halaman utama admin

		
	}

	public function baca_data($user)
	{
		date_default_timezone_set('Asia/Jakarta');
        $tanggal= date('Y');


		$this->db->select('*, count(*) as jumlah');
		$this->db->from('device_user');
	    $this->db->group_by('month(tanggal)');
	    $this->db->where('device_user.username', $user);
		$this->db->where('year(tanggal)', $tanggal);
	    $this->db->join('data','data.machine_code = device_user.machine_code');
		// $this->db->group_by('data.machine_code');
		$data = $this->db->get()->result();
		return $data;
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
/* Please DO NOT modify this information : */
?>