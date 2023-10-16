<?php
include 'class/koneksi.php';
$data = $_GET['data'];
$db = new database();
$data = $db->insertdata($data);
//print_r($data);
//var_dump($data);
if($data==True){
	echo "success";
}
else{
	echo "error";
}

?>