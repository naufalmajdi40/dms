<?php

/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Data_per_device extends CI_Controller
{
    // Konstruktor
	function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model'); 
		$this->load->model('Users_model'); 
		$this->load->model('Device_model');
		$this->load->model('Device_user');
		$this->load->library('form_validation'); 
		$this->load->library('datatables'); 
    }


   public function index($code){
	// Jika session data username tidak ada maka akan dialihkan kehalaman login
	if (!isset($this->session->userdata['username'])) {
		redirect(base_url("login"));
	}

	$this->_rulesData(); // Rules atau aturan bahwa setiap form harus diisi

	// Menampilkan data berdasarkan id-nya yaitu username
	$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
	$deviceUse = $this->Device_user->get_by_id($this->session->userdata['username']);
	$dataAdm = array(
			'username' => $rowAdm->username,
			'nama'     => $rowAdm->nama,
			'kebun'    => $rowAdm->kebun,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
		$user=$rowAdm->username;
		$product_id=$deviceUse->machine_code;

	$dataSensor=array(
				  
				   'back'   => site_url('Beranda'),
				   'disturbance_data'=>$this->baca_data($code),
	               'nim'=>$user,
			);

	$this->load->view('header',$dataAdm);	 
	$this->load->view('data/data_per_day',$dataSensor); 
	$this->load->view('footer'); 
	 
	}

	public function json() {
        header('Content-Type: application/json');
        echo $this->Data_model->json();
    }	


	public function baca_data($user)
	{
	  // Jika session data username tidak ada maka akan dialihkan kehalaman login
	  if (!isset($this->session->userdata['username'])) {
		redirect(base_url("login"));
	  }

	  date_default_timezone_set('Asia/Jakarta');
		$tanggal= date('Y-m-d');
		$this->db->select('*');
		$this->db->from('device_user');
	    $this->db->where('device_user.machine_code', $user);
		$this->db->where('tanggal', $tanggal);
	    $this->db->join('data','data.machine_code = device_user.machine_code');

		// $this->db->where('machine_code', $user);
		

		

	  $data = $this->db->get()->result();
	return $data;
	}



    public function _rulesData()
    {

	}

	

}

?>