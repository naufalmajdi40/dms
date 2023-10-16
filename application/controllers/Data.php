<?php

/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Krs
class Data extends CI_Controller
{
    // Konstruktor
	function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model'); // Memanggil Krs_model yang terdapat pada models
		// $this->load->model('Tanaman_model'); // Memanggil Mahasiswa_model yang terdapat pada models
	    $this->load->model('Device_model');
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
		$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }


   public function index(){
	// Jika session data username tidak ada maka akan dialihkan kehalaman login
	if (!isset($this->session->userdata['username'])) {
		redirect(base_url("login"));
	}

	$this->_rulesData(); // Rules atau aturan bahwa setiap form harus diisi

	// Menampilkan data berdasarkan id-nya yaitu username
	$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
	// $deviceUse = $this->Device_model->get_by_id($this->session->userdata['username']);
	$dataAdm = array(
			'username' => $rowAdm->username,
			'nama'     => $rowAdm->nama,
			'kebun'    => $rowAdm->kebun,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
		// $id_product=$deviceUse->machine_code;
		$user=$rowAdm->username;

	$dataSensor=array(
				  
				   'back'   => site_url('Beranda'),
				   'sensor_data'=>$this->baca_data($user),
	               'nim'=>$user,
				//    'jenis_tanaman'=>$this->Tanaman_model->get_by_id($nim)->jenis_tanaman,
				//    'tgl_panen'=>$this->Tanaman_model->get_by_id($nim)->tgl_panen, 
			);

	$this->load->view('header',$dataAdm);	 // Menampilkan bagian header dan object data users
	$this->load->view('data/data_list',$dataSensor); // Menampilkan data KRS
	$this->load->view('footer'); // Menampilkan bagian footer
	 
	}

	public function json() {
        header('Content-Type: application/json');
        echo $this->Data_model->json();
    }	


	// Fungsi membaca KRS berdasarkan NIM dan Tahun Akademik
	public function baca_data($user)
	{
	  // Jika session data username tidak ada maka akan dialihkan kehalaman login
	  if (!isset($this->session->userdata['username'])) {
		redirect(base_url("login"));
	  }

	  	$this->db->select('*');

		$this->db->from('device_user');
	    $this->db->where('device_user.username', $user);
	    $this->db->join('data','data.machine_code = device_user.machine_code');
		$data = $this->db->get()->result();
		return $data;

	//   $this->db->select('no,machine_code,relay_id,type,port_type,description,lokasi,status,nama_file,tanggal, waktu');
	//   $this->db->from('data');
	//   $this->db->where('machine_code', $nim);
	//   $this->db->order_by('no', 'asc');
	//   $this->db->order_by('waktu', 'asc');
	 
	// //   $this->db->where('k.id_thn_akad', $thn_akad);
	// //   $this->db->join('matakuliah as m','m.kode_matakuliah = k.kode_matakuliah');
	//   $data = $this->db->get()->result();
	// return $data;
	}


	// Fungsi rules atau aturan untuk pengisian pada form KRS
    public function _rulesData()
    {
	 $this->form_validation->set_rules('nim', 'nim', 'trim|required|min_length[10]|max_length[10]');
	//  $this->form_validation->set_rules('id_thn_akad','id_thn_akad', 'trim|required');
	}

	

}

?>