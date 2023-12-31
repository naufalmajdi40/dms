<?php 

/*****************************************************/
/* File        : Users.php                           */
/* Lokasi File : ./application/controllers/Users.php */
/* Copyright   : Amin Rusydi                         */
/*---------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Users
class Admin_users extends CI_Controller
{
    // Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library        
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
        $this->load->view('admin_users/admin_users_list'); // Menampilkan halaman users
		$this->load->view('footer_list'); // Menampilkan bagian footer
    } 
    
	// Fungsi JSON
    public function jsonAdmin() {
        header('Content-Type: application/json');
        echo $this->Users_model->jsonAdmin();
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
            'action' => site_url('admin_users/create_action'),
	        'username' => set_value('username'),
	        'password' => set_value('password'),
	        'email' => set_value('email'),
	        'level' => set_value('level'),
	        'blokir' => set_value('blokir'),	     
		);
		
		$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users
        $this->load->view('admin_users/admin_users_create', $data); // Menampilkan halaman utama yaitu form users 
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form users belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form users telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
				'username' => $this->input->post('username',TRUE),
				'password' => md5($this->input->post('password',TRUE)),
				'email' => $this->input->post('email',TRUE),
				'level' => $this->input->post('level',TRUE),
				// 'blokir' => $this->input->post('blokir',TRUE),
				'id_sessions' => md5($this->input->post('password',TRUE)),
	    );
           
            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin_users'));
        }
    }
    
	// Fungsi menampilkan form users
    public function update($id){
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
		
		// Menampilkan data berdasarkan id-nya yaitu username
        $row = $this->Users_model->get_by_id($id);
		
		// Jika id-nya dipilih maka tampilakan form edit users
        if ($row) {
            $data = array(
                'button' => 'Update',
				'back'   => site_url('users'),
                'action' => site_url('admin_users/update_action'),
				'username' => set_value('username', $row->username),			  
				'email' => set_value('email', $row->email),
				'level' => set_value('level', $row->level),
				'blokir' => set_value('blokir', $row->blokir),			  
			);
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
            $this->load->view('admin_users/admin_users_form', $data); // Menampilkan form tahun akademik semester
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Rules atau aturan bahwa setiap form harus diisi
        $this->_rules();
		
		// Jika form users belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('username', TRUE));
        } 	
		// Jika form users telah diisi dengan benar 
		// maka sistem akan melakukan update data tahun akademik semester kedalam database
		else{
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'email' => $this->input->post('email',TRUE),
		'level' => $this->input->post('level',TRUE),
		'blokir' => $this->input->post('blokir',TRUE),
		'id_sessions' => md5($this->input->post('password',TRUE)),
	    );

            $this->Users_model->update($this->input->post('username', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin_users'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $row = $this->Users_model->get_by_id($id);
		
		//jika id users yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin_users'));
        } 
		//jika id users yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin_users'));
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