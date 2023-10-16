<?php

// extends class Model
class Add_Model extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $input['status']=502;
    $input['error']=true;
    $input['message']='Field tidak boleh kosong';
    return $input;
  }

  // mengambil semua data person
  public function all_data(){
    //$id=$this->get('id');
 
    $all_data = $this->db->get('data')->result();
   // $all_data = $this->db->order_by('no', 'desc')->limit(1)->get('data')->result();
    $response['status']=200;
    $response['sensor']=$all_data;
    return $response;

  }


// function untuk insert data ke tabel tb_person
public function add_sensor($machineCode,$type,$portType,$portNumber,$relayId,$lokasi,$status,$namaFile,$waktu,$flag){
// if(empty($id) || empty($tgl)||$vol==0||$suhu==0||$ec==0||$ph==0||$suhu<10){
//       return $this->empty_response();
//     }
//     else{
      $pisahWaktu = explode(" ", $waktu);

      $date=date_create_from_format("j/n/Y",$pisahWaktu[0]);
      $formatDate = date_format($date,"Y-m-d");
      $tglKirim = date_format($date,"d/m/Y");
      $data = array(
        "machine_code"=>$machineCode,
        "type"=>$type,
        "port_type"=>$portType,
        "description"=>$portNumber,
        "relay_id"=>$relayId,
        "lokasi"=>$lokasi,
        "status"=>$status,
        "nama_file"=>$namaFile,
        "tanggal"=>$formatDate,
        "tgl_kirim"=>$tglKirim,
        "waktu"=>$pisahWaktu[1],
        "flag"=>$flag
      );
$insert = $this->db->insert("data", $data);
if($insert){
        $queryBot = $this->db->query("SELECT * FROM bot WHERE status = 1 LIMIT 1");
        $query = $this->db->query("SELECT * FROM notif");
        $input['status']=200;
        $input['error']=false;
        $input['message']=$data;
        // $input['message']='Data berhasil ditambahkan.';
        

        // $TOKEN = "5095490998:AAFKxXFVfsvniUiB1RBW930RfjCBWy_PDUY";
        // $apiURL = "https://api.telegram.org/bot$TOKEN";

         foreach ($queryBot->result() as $rowBot)
        {
          $TOKEN = $rowBot->bot_token;
        }
        $apiURL = "https://api.telegram.org/bot$TOKEN";
        
        foreach ($query->result() as $row)
        {
          $chatID =  $row->chat_id;
          $productID =  $row->machine_code;
          if($productID == $machineCode){
          file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=<b>DMS Alert !</b>%0a%0aRelay ID : ".$relayId."%0aLokasi    : ".$lokasi."%0aStatus    : ".$status."%0aTanggal  : ".$tglKirim."%0aWaktu     : ".$pisahWaktu[1]." WIB%0a&parse_mode=HTML");
          }
        }
        
        return $input;
      }else{
        $input['status']=502;
        $input['error']=true;
        $input['message']='Data gagal ditambahkan';
        return $input;
      }
    }
// }



}

?>
