<?php

require APPPATH . 'libraries/REST_Controller.php';

class Add extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('Add_Model');
  }

  // method index untuk menampilkan semua data person menggunakan method get

  // public function index_get(){
  //   $response = $this->Add_Model->all_data();
  //   $this->response($response);
  // }
   
  public function index_post(){
        $input = $this->Add_Model->add_sensor(
            $this->input->post('machineCode'),
            $this->input->post('type'),
            $this->input->post('portType'),
            $this->input->post('portNumber'),
            $this->input->post('relayId'),
            $this->input->post('lokasi'),
            $this->input->post('status'),
            $this->input->post('namaFile'),
            $this->input->post('waktu'),
            $this->input->post('flag')
          );
        $this->response($input);
      }

 }

?>
