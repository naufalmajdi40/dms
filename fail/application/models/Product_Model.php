<?php

// extends class Model
class Product_Model extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $input['status']=502;
    $input['error']=true;
    $input['message']='Field tidak boleh kosong';
    return $input;
  }

  // mengambil semua data person
  public function all_data($id){
    //$id=$this->get('id');
    if($id==''){
    $all_set = $this->db->get('tanaman')->result();
    $all_notif = $this->db->get('notifikasi')->result();
    $all_data = $this->db->get('data')->result();
    }
    else{
    $this->db->where('id_product',$id);
    $all_set = $this->db->get('tanaman')->result();
    $all_notif = $this->db->get('notifikasi')->result();
    $all_data = $this->db->where('code_product',$id)->order_by('no', 'desc')->limit(1)->get('data')->result();
    }
    $response['status']=200;
    $response['pengaturan']=$all_set;
    $response['notifikasi']=$all_notif;
    $response['sensor']=$all_data;
    return $response;

  }




}

?>
