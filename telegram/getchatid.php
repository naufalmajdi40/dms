<?php
//ini_set('error_reporting', E_STRICT);
include 'class/koneksi.php';
$db = new database();
$bottoken = $db->get_token();
    // $update=file_get_contents('https://api.telegram.org/bot'.$bottoken.'/getUpdates?offset=-1');
	$update=file_get_contents('https://api.telegram.org/bot'.$bottoken.'/getUpdates?offset=-1');
    $data =   json_decode($update, true);
    $jml = (int)$data["ok"];
    $chatid='';
    $messageid='';
    $content='';
    $myObj='';
	function kirimTelegram($bottoken,$pesan,$chatid) {
		// $pesan = json_encode($pesan);
		$API = "https://api.telegram.org/bot".$bottoken."/sendmessage?chat_id=".$chatid."&text=".$pesan."";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, $API);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
}
   // echo $jml;
   $user = null;
    if($jml==1){
        $result = $data["result"];
        $result2 =($result[0]);
        $updateid = $result2["update_id"];
		
		    $chatid = $result2["message"]["chat"]["id"];
            $messageid = $result2["message"]["message_id"];
            $content =  $result2["message"]["text"];
			$nama_depan =  $result2["message"]["from"]["first_name"];
			$nama_belakang =  $result2["message"]["from"]["last_name"];
            //dijadikan json
            $user= $db->get_user_bychatid($chatid);
			$parse = explode("*",$content);	
			$code = $parse[1];
			
		echo $code;
			if($user){
				print("User Tersedia");
				if($parse[0]=="del"){
					print("User ".$chatid." telah di hapus");
					$msg = "Anda telah berhenti di layanan Device Monitoring System";
					kirimTelegram($bottoken,$msg,$chatid);
					$db->del_user($chatid);
				}
				else{$msg = 'User sudah tersedia';
				// kirimTelegram($bottoken,$msg,$chatid);
				}
			}
			else{
				print_r('user belumtersedia');
				if($parse[0]=="start" || $parse[0]=="mulai" ){
					print_r('user '.$parse[1].' didaftarkan'  );
					$msg = "Hai ".$nama_depan."%0aDMS BOT merupakan bot telegram yang dapat membantu Anda mendapatkan file disturbance record dengan cepat %0a ketik 'Daftar' untuk mendaftarkan diri Anda pada sistem ini";
					// kirimTelegram($bottoken,$msg,$chatid);
					// echo "sukses";
					// $db->ins_user();
				}
				else if($parse[0]=="daftar"){
					print_r('user '.$nama_depan.' didaftarkan'  );
					$msg = "Selamat ".$nama_depan." ".$nama_belakang." , Anda berhasil terdaftar di Device Monitoring System";
					kirimTelegram($bottoken,$msg,$chatid);
					echo $parse[1];
					$db->ins_user($chatid,$nama_depan." ".$nama_belakang,$code);
				}
			}
			//print_r(strlen($user));
        
       
      //  print_r($chat);
       // echo print_r($result);
    }
  ?>