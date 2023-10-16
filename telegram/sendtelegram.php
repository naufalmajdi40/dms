<?php
 
define('BOT_TOKEN', '5095490998:AAFKxXFVfsvniUiB1RBW930RfjCBWy_PDUY');
define('CHAT_ID','712281930');
$chat = $_GET['chat'];
function kirimTelegram($pesan) {
    $pesan = json_encode($pesan);
    $API = "https://api.telegram.org/bot".BOT_TOKEN."/sendmessage?chat_id=".CHAT_ID."&text=$pesan";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, $API);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
 
$data= kirimTelegram($chat);
echo $data;
?>