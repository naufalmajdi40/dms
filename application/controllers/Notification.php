<?php 

/*****************************************************/
/* File        : Users.php                           */
/* Lokasi File : ./application/controllers/Users.php */
/* Copyright   : Amin Rusydi                         */
/* Publish     : Teknik Mekatronika                  */
/*---------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Users
class Notification extends CI_Controller
{
    // Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Notification_model'); // Memanggil Users_model yang terdapat pada models
		$this->load->model('Users_model');
		$this->load->model('Device_model');
	    $this->load->model('Device_user');
        //$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library        
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman users
    public function index(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'nama'     => $rowAdm->nama,
			'kebun'    => $rowAdm->kebun,
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);  		
		$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users
        $this->load->view('notification'); // Menampilkan halaman users
		$this->load->view('footer'); // Menampilkan bagian footer
    } 
    
	// Fungsi JSON
    public function json() {
		$rowAdm = $this->Device_user->get_by_id($this->session->userdata['username']);
		$id_product=$rowAdm->machine_code;
        header('Content-Type: application/json');
        echo $this->Notification_model->json($id_product);
    }
    
	// Fungsi menampilkan form Create Users
    public function create(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
        $rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'nama'     => $rowAdm->nama,
			'username' => $rowAdm->username,
			'kebun'    => $rowAdm->kebun,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);  		
		
		// Menampung data yang diinputkan
        $data = array(
            'button' => 'Create',
			'back'   => site_url('users'),
            'action' => site_url('users/create_action'),
	        'username' => set_value('username'),
	        'password' => set_value('password'),
	        'email' => set_value('email'),
	        'level' => set_value('level'),
	        'blokir' => set_value('blokir'),	     
		);
		
		$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users
        $this->load->view('users/users_form', $data); // Menampilkan halaman utama yaitu form users 
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    


	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $row = $this->Notification_model->get_by_id($id);
		
		//jika id users yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Notification_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
			
            redirect(site_url('notification'));
        } 
		//jika id users yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notification'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');	
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
?>