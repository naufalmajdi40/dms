<?php

require APPPATH . 'libraries/REST_Controller.php';

class Monitoring extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('Monitoring_Model');
  }

  // method index untuk menampilkan semua data person menggunakan method get
       public function index_get(){
     $id=$this->input->get('id');
     $response = $this->Monitoring_Model->all_data($id);
     $this->response($response);
      }

 }

?>
