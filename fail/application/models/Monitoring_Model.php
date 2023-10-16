<?php

// extends class Model
class Monitoring_Model extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // mengambil semua data person
  public function all_data($id){
    //$id=$this->get('id');
    if($id==''){
    $this->db->order_by("no", "desc");
    $all = $this->db->get('data')->result();
    
    }
    else{
    $this->db->where('code_product',$id);
    $this->db->order_by("no", "desc");
    $all = $this->db->get('data')->result();

    }
    $response2['monitoring']=$all;
    return $response2;

  }



}

?>
