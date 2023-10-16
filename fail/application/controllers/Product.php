<?php

require APPPATH . 'libraries/REST_Controller.php';

class Product extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('Product_Model');
  }

  // method index untuk menampilkan semua data person menggunakan method get
       public function index_get(){
     $id=$this->input->get('id');
     $response = $this->Product_Model->all_data($id);
     $this->response($response);
      }
 }

?>
