<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Getid extends CI_Controller {
    function __construct(){
        parent::__construct();
		//$this->load->model('Notif_model'); 
		$this->load->model('Getid_model'); 
    }
 
    public function index(){
		$id="16049";
		$row = $this->Getid_model->get_by_id($id);


	
		$user = $row->chat_id;

	//	echo $user;

		$bottoken = '1869021911:AAHCQ8vHSH59XTuGqje_D3U0jLA92iOvwu0'; //token untuk test
		$update= file_get_contents('https://api.telegram.org/bot'.$bottoken.'/getUpdates?offset=-1');
		$data =   json_decode($update, true);
		$jml = (int)$data["ok"];
		$chatid='';
		$messageid='';
		$content='';
		$myObj='';
		
		$user = null;
		if($jml==1){
			$result = $data["result"];
			$result2 =($result[0]);
			$updateid = $result2["update_id"];
			//$db = new database();
			
				$chatid = $result2["message"]["chat"]["id"];
				$messageid = $result2["message"]["message_id"];
				$content =  $result2["message"]["text"];
				//dijadikan json
				//$user= $db->get_user_bychatid($chatid);
				
				$parse = explode(" ",$content);	
				if($user){
					print("User Tersedia");
					if($parse[0]=="del"){
						print("User ".$chatid." telah di hapus");
						$msg = "anda telah berhenti di layanan Device Monitoring System";
						kirimTelegram($bottoken,$msg,$chatid);
						// $db->del_user($chatid);
					}
					else{$msg = "User sudah tersedia";
					//kirimTelegram($bottoken,$msg,$chatid);
					}
				}
				else{
					print_r('user belumtersedia');
					if($parse[0]=="daftar"){
						print_r('user '.$parse[1].' didaftarkan'  );
						$msg = "Selamat ".$parse[1]." Anda berhasil terdaftar di Device Monitoring System";
						$this->kirimTelegram($bottoken,$msg,$chatid);
						// $db->ins_user($chatid,$parse[1]);
					}
				}
		
	
		}
     
            
    }

	public function kirimTelegram($bottoken,$pesan,$chatid) {
		$pesan = json_encode($pesan);
		$API = "https://api.telegram.org/bot".$bottoken."/sendmessage?chat_id=".$chatid."&text=$pesan";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, $API);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

 
    
}
?>




