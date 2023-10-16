
<?php
	include 'class/koneksi.php';
	define('BOT_TOKEN', '5095490998:AAFKxXFVfsvniUiB1RBW930RfjCBWy_PDUY');
	//define('CHAT_ID','712281930');
	$ps = $_GET['chat'];
	
	function kirimTelegram($pesan ,$c_id) {
		//$pesan = json_encode($pesan);
		$API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".$c_id."&text=".$pesan;
		echo $API;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_URL, $API);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
		
	}
$db = new database();
$data = $db->insertnotif($ps);
$user = $db->get_user();
$hasil = [];
while($row = mysql_fetch_assoc($user)){
		$hasil[] = $row;		
		$dts = urlencode($ps);
		$dt= kirimTelegram($dts,$row['chat_id']);
	
	}
var_dump($hasil);

//if($data){
//echo $dt;}
//else {
//	echo 'erro';
//}//
?>
