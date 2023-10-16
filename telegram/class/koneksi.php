<?php 
 
class database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "dms_database";
 
	function __construct(){
		mysql_connect($this->host, $this->uname, $this->pass);
		mysql_select_db($this->db);
	}
	function tampilmonitoring(){
		$hasil = [];
		$data = mysql_query("select * from monitoring order by waktu desc limit 8 ");
			while($row = mysql_fetch_assoc($data)){
				$hasil[] = $row;
			}
			return $hasil;
			
	}
	function ins_user($chat,$name,$id){
		$data = mysql_query("insert into notif (chat_id,name,machine_code) values ('".$chat."','".$name."','".$id."')");
		return ($data);
		
	}
    function get_token(){
		$data = mysql_query("select * from bot where status = 1");
		while ($row = mysql_fetch_assoc($data)) {
			$hasil =  $row['bot_token'];
		}
		return ($hasil);
		
		
	}
	function del_user($chat){
		$data = mysql_query("delete from notif where chat_id = '".$chat."'");
		return ($data);
		
	}
	function get_user(){
		$data = mysql_query("select * from notif");
		return $data;
	}
	function get_user_bychatid($chat){
		$data = mysql_query("select * from notif where chat_id = '".$chat."'");
		$cek = mysql_num_rows($data);
		return $cek;
	}
	function insertnotif($dt){
			$data = mysql_query("insert into it_notif (chat) values ('".$dt."')");
			return $data;
			}

	
	
} 
 
?>