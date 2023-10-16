<?php 
/************************************************************/
/* File        : Infonutrisi.php                            */
/* Lokasi File : ./application/controllers/Matakuliah.php   */
/* Copyright   : Amin Rusydi                                */
/*----------------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Matakuliah
class faq extends CI_Controller
{
    // Konstruktor	
	function __construct()
    {
        parent::__construct();
        
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman matakuliah
    public function index(){	
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']); 
		$data = array(	
			'username' => $row->username,
			'kebun' => $row->kebun,
			'nama' => $row->nama,
			'email'    => $row->email,
			'level'    => $row->level,
		);		
		$this->load->view('header',$data); // Menampilkan bagian header dan object data users 
        $this->load->view('faq/faq_read'); // Menampilkan halaman utama matakuliah
		$this->load->view('footer'); // Menampilkan bagian footer
    }
	
	// Fungsi JSON
	public function json() {
        header('Content-Type: application/json');
        echo $this->Infonutrisi_model->json();
    }	

}

/* End of file Matakuliah.php */
/* Location: ./application/controllers/Matakuliah.php */
/* Please DO NOT modify this information : */
?>