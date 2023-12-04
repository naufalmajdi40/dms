<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mon extends CI_controller{
    function __construct() {
		parent::__construct();
			  $this->setCors();
		$this->load->model('Mon_model');
          $this->load->model('Data_model'); // Memanggil Krs_model yang terdapat pada models
	    $this->load->model('Device_model');
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
		$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }

    public function apiReadMon(){
        $row['data']=$this->Mon_model->get_all()->result();
        echo json_encode($row);
    }
    
    
    public function updPosition2(){
        $pos  =$this->input->get('data');
        $row=$this->Mon_model->update_pos2($pos);
       // echo $row;
        if($row){
            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Update Success',
                
                )
            );
        }
        else {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Update Fail',
                
                )
            );
        };
    }
    public function updPosition(){
        $pos  =$this->input->get('data');
        $row=$this->Mon_model->update_pos($pos);
        if($row){
            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Update Success',
                
                )
            );
        }
        else {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Update Fail',
                
                )
            );
        };
    }
    public function dashboardMon(){
         // Jika session data username tidak ada maka akan dialihkan kehalaman login
         if (!isset($this->session->userdata['username'])) {
            redirect(base_url("login"));
        }
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
    
        $row['data']=$this->Mon_model->get_device_permesin_all();
    
        $this->load->view('header',$dataAdm);	 // Menampilkan bagian header dan object data users
        $this->load->view('dashboard_mon',$row); // Menampilkan config com
        $this->load->view('footer'); // Menampilkan bagian footer
    }
    public function index(){
        // Jika session data username tidak ada maka akan dialihkan kehalaman login
        if (!isset($this->session->userdata['username'])) {
            redirect(base_url("login"));
        }
       // $this->_rulesData(); // Rules atau aturan bahwa setiap form harus diisi
    
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
    
        $row['data']=$this->Mon_model->get_all();
    
        $this->load->view('header',$dataAdm);	 // Menampilkan bagian header dan object data users
        $this->load->view('data/data_mon',$row); // Menampilkan config com
        $this->load->view('footer'); // Menampilkan bagian footer
        }
    public function add_mon(){
		 header('Content-Type: application/json');
         $data=$this->input->post('dt');
         $data2=$this->input->post('device');
       //  $dt=var_dump($data);
        
         $res['data']=$this->Mon_model->insert_mon_all($data,$data2);
        if($res['data']){
            //echo $data;
            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Sync Data Success'
                    
                
                )
            );
			}
			else{
                echo json_encode(
                    array(
                        'success' => false,
                        'message' => 'Sync Failed',
                    
                    )
                );
		}
        
        
	
       
    }
	  private function setCors()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 86400"); //cache 1 day
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    }

}

?>