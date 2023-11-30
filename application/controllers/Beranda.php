<?php

/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Admin
class Beranda extends CI_Controller {
	
	// Konstrutor 
	function __construct() {
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->model('Device_model');
		$this->load->model('Data_model');
		$this->load->model('Device_model');
	    $this->load->model('Device_user');
		$this->load->model('Notifikasi_model');
		$this->load->library('form_validation');
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	}
	
	// Fungsi untuk menampilkan halaman utama admin
	public function index() {
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
	    $deviceUse = $this->Device_user->get_by_id($this->session->userdata['username']);
		$data = array(	
			'username' => $row->username,
			'nama'     => $row->nama,
			'kebun'     => $row->kebun,
			'email'    => $row->email,
			'level'    => $row->level,
		
		);
	
		$id_product=$deviceUse->machine_code;
		$user=$row->username;
	    $level=$row->level;
		
		// if($this->Tanaman_model->get_by_id($id_product)->status==0)
		// {
		// $Sensor=array(
				  
		// 	'sensor_data'=>$this->baca_data($id_product),
		// 	'id_product'=>$id_product,
		// 	'status'=>$this->Tanaman_model->get_by_id($id_product)->status, 
		// 	'jenis_tanaman'=>$this->Tanaman_model->get_by_id($id_product)->jenis_tanaman, 
		// 	'tgl_panen'=>$this->Tanaman_model->get_by_id($id_product)->tgl_panen,
		// 	'latitude'=>$this->Notifikasi_model->get_by_id($id_product)->latitude,
		// 	'gambar'=>$this->Notifikasi_model->get_by_id($id_product)->gambar,
		// 	'longitude'=>$this->Notifikasi_model->get_by_id($id_product)->longitude,
		// 	'tgl_tanam'=>$this->Tanaman_model->get_by_id($id_product)->tgl_tanam,);

		// $this->load->view('header',$data);
		// $this->load->view('beranda',$Sensor); // Menampilkan halaman utama admin
		// }

		if($level=='user'){
			$Sensor=array(
				  
				'sensor_data'=>$this->baca_data($user),
				'disturbanceDay'=>$this->disturbance_day($user),
				'eventDay'=>$this->event_day($user),
				'disturbanceDevice'=>$this->disturbance_device($id_product),
				'countDisturbance'=>$this->count_disturbance($user),
				'pieData'=>$this->pie_chart($id_product),
				'notif'=>$this->user_notif($user),
				'id_product'=>$id_product,
				'pemetaan'=>$this->Device_model->get_map($user),
				'monitor'=>$this->monitor_data(),
				'device'=>$this->device_list_device()
				// 'jenis_tanaman'=>$this->Tanaman_model->get_by_id($id_product)->jenis_tanaman, 
				// 'tgl_panen'=>$this->Tanaman_model->get_by_id($id_product)->tgl_panen,
				// 'latitude'=>$this->Notifikasi_model->get_by_id($id_product)->latitude,
				// 'gambar'=>$this->Notifikasi_model->get_by_id($id_product)->gambar,
				// 'longitude'=>$this->Notifikasi_model->get_by_id($id_product)->longitude,);
				// 'tgl_tanam'=>$this->Tanaman_model->get_by_id($id_product)->tgl_tanam,
			);
	
			$this->load->view('header',$data);
			$this->load->view('beranda',$Sensor); // Menampilkan halaman utama admin
		}
		
		if($level=='admin'){
			$Sensor=array(
				  
				'sensor_data'=>$this->baca_data($user),
				'disturbanceDay'=>$this->disturbance_day($user),
				'disturbanceDevice'=>$this->disturbance_device($id_product),
				'countDisturbance'=>$this->count_disturbance($user),
				'pieData'=>$this->pie_chart($id_product),
				'notif'=>$this->user_notif($user),
				'id_product'=>$id_product,
				'pemetaan'=>$this->Device_model->get_map($user), 
				'monitor'=>$this->monitor_data(),
				'device'=>$this->device_list_device()
				// 'jenis_tanaman'=>$this->Tanaman_model->get_by_id($id_product)->jenis_tanaman, 
				// 'tgl_panen'=>$this->Tanaman_model->get_by_id($id_product)->tgl_panen,
				// 'latitude'=>$this->Notifikasi_model->get_by_id($id_product)->latitude,
				// 'gambar'=>$this->Notifikasi_model->get_by_id($id_product)->gambar,
				// 'longitude'=>$this->Notifikasi_model->get_by_id($id_product)->longitude,);
				// 'tgl_tanam'=>$this->Tanaman_model->get_by_id($id_product)->tgl_tanam,
			);
	
			$this->load->view('header',$data);
			$this->load->view('beranda2',$Sensor); // Menampilkan halaman utama admin
		}

	
		
	}
	 
	public function monitor_data(){
		$qry ="select * FROM im_mon a inner join device_list_perdevice b on a.id_device =b.id_device ORDER BY a.position  asc limit 8";
		return $this->db->query($qry)->result();
	}

	public function device_list_device(){
		$qry ="select * FROM device_list_perdevice";
		return $this->db->query($qry)->result();
	}
	public function baca_data($user)
	{

		// $this->db->select('no,machine_code,type,port_type,description,relay_id,lokasi,status,nama_file,tanggal,waktu');
		// $this->db->from('data');
		// $this->db->where('machine_code', $nim);

		$this->db->select('*');
		$this->db->from('device_user');
	    $this->db->where('device_user.username', $user);
	    $this->db->join('data','data.machine_code = device_user.machine_code');
		$data = $this->db->get()->result();
		return $data;
	}

	public function disturbance_day($user)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal= date('Y-m-d');
		$this->db->select('no,machine_code,type,relay_id,lokasi,status,nama_file,tanggal,waktu');
		$this->db->from('device_user');
	    $this->db->where('device_user.username', $user);
		$this->db->where('data.tanggal', $tanggal);
		$this->db->where('data.type', "MICOM P123");
	    $this->db->join('data','data.machine_code = device_user.machine_code');

	
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function event_day($user)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal= date('Y-m-d');
		$this->db->select('no,machine_code,type,relay_id,lokasi,status,nama_file,tanggal,waktu');
		$this->db->from('device_user');
	    $this->db->where('device_user.username', $user);
		$this->db->where('data.tanggal', $tanggal);
		// $this->db->where('data.type', "MICOM P123");
	    $this->db->join('data','data.machine_code = device_user.machine_code');

	
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

		public function disturbance_device()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal= date('Y-m-d');
		$this->db->select('no,machine_code,relay_id,lokasi,status,nama_file,tanggal,waktu');
		$this->db->from('device_user');
	    // $this->db->where('device_user.machine_code', $user);
		$this->db->where('data.tanggal', $tanggal);
	    $this->db->join('data','data.machine_code = device_user.machine_code');

	
		$num_results = $this->db->count_all_results();
		return $num_results;
	}
    public function count_disturbance($user)
	{
			date_default_timezone_set('Asia/Jakarta');
		$tanggal= date('Y-m-d');
		$this->db->select('*, count(*) as jumlah');
		$this->db->from('device_user');
		//  $this->db->group_by('device_user.machine_code');
	    $this->db->group_by('data.machine_code');
	    $this->db->where('device_user.username', $user);
		   $this->db->where('data.tanggal', $tanggal);
	    $this->db->join('data','data.machine_code = device_user.machine_code');
		// $this->db->group_by('data.machine_code');
		$data = $this->db->get()->result();
		return $data;

	}
	public function user_notif($user)
	{

		$this->db->select('*');
		$this->db->from('device_user');
	    $this->db->where('device_user.machine_code', $user);
	    $this->db->join('notif','notif.machine_code = device_user.machine_code');


		// $this->db->select('chat_id');
		// $this->db->from('notif');
		// $this->db->where('machine_code', $id_product);
		$hasil = $this->db->count_all_results();
		return $hasil;
	}

	public function pie_chart($nim)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal= date('j/n/Y');
		$this->db->select('type, tanggal, count(*) as total');
		$this->db->group_by('month(tanggal)');
		$this->db->group_by('type');
		$this->db->from('data');
		$this->db->where('machine_code', $nim);
		// $this->db->where('tanggal', $tanggal);
		// $num_results = $this->db->count_all_results();
	  //   $this->db->where('k.id_thn_akad', $thn_akad);
	  //   $this->db->join('matakuliah as m','m.kode_matakuliah = k.kode_matakuliah');
		// $disturbance = $this->db->get()->result();
		//$hitung = $disturbance->num_rows();
		$dataPie = $this->db->get()->result();
		return $dataPie;
	}

	
	// Fungsi melakukan logout
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
/* Please DO NOT modify this information : */
?>