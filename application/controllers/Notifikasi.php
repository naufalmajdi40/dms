<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Mahasiswa
class Notifikasi extends CI_Controller
{
     // Konstruktor			
	function __construct()
    {
		parent::__construct();
        $this->load->model('Notifikasi_model'); // Memanggil Notifikasi_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->helper(array('form', 'url')); // Memanggil form dan url yang terdapat pada helper

	}
	// Fungsi untuk menampilkan halaman User Proses Tanam
    public function index(){   
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id product-nya 
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		
		$dataAdm = array(	
			'username' => $rowAdm->username,
			'nama'     => $rowAdm->nama,
			'kebun'    => $rowAdm->kebun,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,

		);
		$id=$rowAdm->username;
		$row = $this->Notifikasi_model->get_by_id($id);
		$mode = $row->status;

		// Jika data tanaman tersedia maka akan ditampilkan
        if ($row && $mode==0) {
            $data = array(
				'status' => $row->status,
				'button' => 'Atur Notifikasi',
				'action' => site_url('notifikasi/notifikasi_action'),
				'back'   => site_url('beranda'),
				'nim' => $row->id_product,
		
			
			);
	
		$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('notifikasi/tidak_aktif', $data); // Menampilkan halaman utama mahasiswa
		$this->load->view('footer'); // Menampilkan bagian footer
	}
	if ($row && $mode==1) {
		$data = array(
			'status' => $row->status,
			'button' => 'Matikan Notifikasi',
	
			'action' => site_url('notifikasi/matikan_notifikasi'),
			'back'   => site_url('beranda'),
			'nim' => $row->id_product,
			'latitude' => $row->latitude,
			'longitude' => $row->longitude,
			'email' => $row->email,
			'chat_id' => $row->chat_id,
			
		);

	$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
	$this->load->view('notifikasi/notifikasi_list', $data); // Menampilkan halaman utama mahasiswa
	$this->load->view('footer'); // Menampilkan bagian footer
}
}

public function matikan_notifikasi(){
		
	// Jika session data username tidak ada maka akan dialihkan kehalaman login			
	if (!isset($this->session->userdata['username'])) {
		redirect(base_url("login"));
	
	
	}
	$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
	$id=$rowAdm->username;
	$row = $this->Notifikasi_model->get_by_id($id);

	if ($row) {

		$data = array(
	   'status' => "0",
	   'latitude' => "",
	   'longitude' => "",
	   'email' =>"",
	   'chat_id' =>"",
		
			);            
			
			$this->Notifikasi_model->update($id, $data);
			redirect(site_url('notifikasi'));	
		
		}	
}

	public function notifikasi_action(){
		
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		
		
		}
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
	
		
		$dataAdm = array(	
			'username' => $rowAdm->username,
			'nama'     => $rowAdm->nama,
			'kebun'    => $rowAdm->kebun,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,

		);
		
		$id=$rowAdm->username;
		$row = $this->Notifikasi_model->get_by_id($id);
       
			

	if ($row) {
		$data = array(
			'status' => $row->status,
			'id_product'=>$this->Users_model->get_by_id($this->session->userdata['username']),
			'button' => 'Aktifkan Notifikasi',
	    	'action' => site_url('notifikasi/aktif_action'),
			'back'   => site_url('notifikasi'),
			'nim' => $row->id_product,
			'latitude' => $row->latitude,
			'longitude' => $row->longitude,
			'chat_id' => $row->chat_id,
			'email' => $row->email,
			
		);

	$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
	$this->load->view('notifikasi/notifikasi_form', $data); // Menampilkan halaman proses tanam
	$this->load->view('footer'); // Menampilkan bagian footer
  }	
}

public function aktif_action(){
		
	// Jika session data username tidak ada maka akan dialihkan kehalaman login			
	if (!isset($this->session->userdata['username'])) {
		redirect(base_url("login"));
	
	
	}
	$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
	$id=$rowAdm->username;
	$row = $this->Notifikasi_model->get_by_id($id);
	$latitude = $this->input->post('latitude',TRUE);
	$longitude = $this->input->post('longitude',TRUE);
	$chat_id = $this->input->post('chat_id',TRUE);
	$email = $this->input->post('email',TRUE);

if ($row) {
	$simpan = array(
		// 'status' => "1",
		'status' => "1",
		'latitude' => $latitude,
		'longitude' => $longitude,
		'chat_id' => $chat_id,
		'email' => $email,
		
	);
}

	   $this->Notifikasi_model->update($id, $simpan);
	// $this->Tanaman_model->update($this->input->post($id, $simpan));
	redirect(site_url('notifikasi'));	
	
			
	}	
	

}
	
