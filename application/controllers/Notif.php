<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Notif extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('Notif_model'); 
		//$this->load->model('Chat_model'); 
    }
 
    public function index(){
		// $id="16049";
		// $row = $this->Notif_model->get_all($id);

        // // $coba=$this->input->post('machineCode');
	
		// $relay = $this->input->post('relayId');
		// $lokasi = $this->input->post('lokasi');
		// $status = $this->input->post('status');
		// $waktu = $this->input->post('waktu');

		// $namaFile = $this->input->post('namaFile');
		// $nama_file="C:/xampp/htdocs/dms/dr_files/".$namaFile.".zip";


		$upload_dir = 'dr_files';
		$name = basename($_FILES["myfile"]["name"]);
		$target_file = "$upload_dir/$name";
		if ($_FILES["myfile"]["size"] > 100000000) { // limit size of 10KB
			echo 'error: your file is too large.';
			exit();
		}
		if (!move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file))
			echo 'error: '.$_FILES["myfile"]["error"].' see /var/log/apache2/error.log for permission reason';
		else {
			if (isset($_POST['method'])) print_r($_POST);
			echo "\n filename : {$name}";


	    //  $query = $this->db->query("SELECT * FROM notif");
		//  define('BOT', '1607521967:AAErjzP0St1Y2_p44ZsWwJgIzXEjQJNsHTQ');
		//  define('FILENAME', $nama_file);
 
		// if ($query->num_rows() > 0 )
		// {
		// foreach ($query->result() as $row2)
		// {	
		// 	$chatId =  $row2->chat_id;
		// 	$ch = curl_init();
		// 	curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".BOT."/sendDocument?chat_id=" .$chatId."&caption=Silahkan download File Disturbance Record diatas%0a%0aRelay ID : ".$relay."%0aLokasi    : ".$lokasi."%0aStatus    : ".$status."%0aWaktu     : ".$waktu."");
		// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 	curl_setopt($ch, CURLOPT_POST, 1);
		
		// 	// Create CURLFile
		// 	$finfo = finfo_file(finfo_open(FILEINFO_MIME_TYPE), FILENAME);
		// 	$cFile = new CURLFile(FILENAME, $finfo);
		
		// 	// Add CURLFile to CURL request
		// 	curl_setopt($ch, CURLOPT_POSTFIELDS, [
		// 		"document" => $cFile
				
		// 	]);
		
		// 	// Call
		// 	$result = curl_exec($ch);
		// 	// $output =  $result;
		
		// 	// Show result and close curl
		// 	// var_dump($result);
		// 	curl_close($ch);
			
		// }
		//     // define('CHAT_ID', $chatId);
			

		
		// }
			
	
		// echo $namaFile;
		//echo "id:".$coba;
        
		
		
		}
	
		}
     
            
    }
 
    

?>




