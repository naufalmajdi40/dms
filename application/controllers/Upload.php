<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('Data_model'); 
    }
 
    function index(){
		$id="1";
		$row = $this->Data_model->get_by_id($id);
		$relay = $row->relay_id;
		$lokasi = $row->lokasi;
		$status = $row->status;
		$namaFile = $row->nama_file;
		$nama_file="C:/xampp/htdocs/dms/dr_files/".$namaFile.".zip";
		$nama_file2="https://localhost/dms/assets/coba.pdf";
		//$files= file_get_contents($nama_file);

		
	
		$waktu = $row->waktu;


		$TOKEN = "1607521967:AAErjzP0St1Y2_p44ZsWwJgIzXEjQJNsHTQ";
        $apiURL = "https://api.telegram.org/bot$TOKEN";
		$chatID = "1027787224";
     
		$upload_dir = 'dr_files';
		$name = basename($_FILES["myfile"]["name"]);
		$target_file = "$upload_dir/$name";
		if ($_FILES["myfile"]["size"] > 100000000) {
			echo 'error: your file is too large.';
			exit();
			
		}
		if (!move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file))
			echo 'error: '.$_FILES["myfile"]["error"].' see /var/log/apache2/error.log for permission reason';
		else {
			if (isset($_POST['method'])) print_r($_POST);
		
			// define('CHAT_ID', '1027787224');
			// define('BOT', '1607521967:AAErjzP0St1Y2_p44ZsWwJgIzXEjQJNsHTQ');
			// define('FILENAME', $nama_file);
			// // CONST CHAT_ID = '1607521967:AAErjzP0St1Y2_p44ZsWwJgIzXEjQJNsHTQ';
		
		
			// // CONST FILENAME = 'C:/xampp/htdocs/dms/dr_files/coba.zip';
		
			// // Create CURL object
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".BOT."/sendDocument?chat_id=" . CHAT_ID."&caption=Silahkan download File Disturbance Record diatas%0a%0aRelay ID : ".$relay."%0aLokasi    : ".$lokasi."%0aStatus    : ".$status."%0aWaktu     : ".$waktu."");
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_POST, 1);
		
			// // Create CURLFile
			// $finfo = finfo_file(finfo_open(FILEINFO_MIME_TYPE), FILENAME);
			// $cFile = new CURLFile(FILENAME, $finfo);
		
			// // Add CURLFile to CURL request
			// curl_setopt($ch, CURLOPT_POSTFIELDS, [
			// 	"document" => $cFile
				
			// ]);
		
			// // Call
			// $result = curl_exec($ch);
			// $output =  $result;
		
			// // Show result and close curl
			// // var_dump($result);
			// curl_close($ch);

			echo "\n filename : {$name}";
			
		}
     
            
    }
 
    
}




?>