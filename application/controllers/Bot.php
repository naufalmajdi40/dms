
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Bot extends CI_Controller {
    function __construct(){
        parent::__construct();
    }
 
    function index(){
        $TOKEN = "1459811323:AAE5JfoLAGat0HLrixVBbOc6FKrx4nlDdFE";
        $apiURL = "https://api.telegram.org/bot$TOKEN";
        $apiTanam = "https://api.hijauberseri.com/product?id=";
        $apiMonitoring = "https://api.hijauberseri.com/monitoring?id=";
        $update = json_decode(file_get_contents("php://input"), TRUE);
        $chatID = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];
        $name =  $update["message"]["chat"]["first_name"];
        $name2 =  $update["message"]["chat"]["last_name"];
       // $userId = $message['chat']['id'];
     //   $data = $update["message"]["text"];
        
        if (strpos($message, "/start") === 0) {
        
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai <b>".$name." ".$name2."</b>,%0a%0aIni merupakan chat bot dari hijau berseri. Chat bot merupakan robot yang berjalan secara otomatis untuk membantumu mendapatkan informasi.%0a%0aChat bot ini tidak dapat menjawab pertanyaan pribadimu, namun dapat menjalankan perintah yang kamu ketikan untuk mengetahui kondisi alat kontrol hirdoponik milikmu.&parse_mode=HTML");
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Berikut perintah yang dapat kamu jalankan : %0a%0a<b>/myID</b> ,digunakan untuk mengetahui chat ID milikmu, chat ID dapat kamu masukan ke pengaturan notifikasi pada website untuk mendapatkan notifikasi yang dikirimkan secara otomatis melalui telegram. Notifikasi berisikan informasi jika tanaman sudah siap di panen, juga jika botol nutrisi atau pH habis.%0a%0a<b>/info id_product</b> ,digunakan untuk mengetahui pengaturan alat dan proses tanam sesuai dengan kode product alat hidroponik milikmu.%0a%0a<b>/monitoring id_product</b> ,digunakan untuk mengetahui pembacaan sensor terupdate dari alat kontrol hidroponik milikmu%0a%0a<b>Hijau Berseri</b>%0a<em>Bertanam untuk hidup yang lebih sehat</em>.%0ahttp://hijauberseri.com&parse_mode=HTML");
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "/myID") === 0) {
            $location = substr($message,5);
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai ".$name." ".$name2.",%0aID chat telegram kamu adalah : ".$chatID."&parse_mode=HTML");
        }

        if (strpos($message, "/monitoring") === 0) {
            $location = substr($message,12);
            // if ($location!==""){
            // $weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=2e4c792afa82b61338e10bc1e920b65d"), TRUE)["weather"][0]["main"];
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai saat ini ada perbaikan di bagian monitoring&parse_mode=HTML");
        
            // file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text= Hai maaf saat ini amin rusydi lagi memperbaiki bagian monitoring data&parse_mode=HTML");
            // }
        } 
        if (strpos($message, "/info") === 0) {
            $id = substr($message,6);
            if ($id!=0){
            $idProduct = json_decode(file_get_contents($apiTanam.$id), TRUE)["pengaturan"][0]["id_product"];
            $jenisTanaman = json_decode(file_get_contents( $apiTanam.$id), TRUE)["pengaturan"][0]["jenis_tanaman"];
            $tglTanam = json_decode(file_get_contents($apiTanam.$id), TRUE)["pengaturan"][0]["tgl_tanam"];
            $tglPanen = json_decode(file_get_contents( $apiTanam.$id), TRUE)["pengaturan"][0]["tgl_panen"];
            $setSuhu = json_decode(file_get_contents( $apiTanam.$id), TRUE)["pengaturan"][0]["set_suhu"];
            $setNutrisi = json_decode(file_get_contents( $apiTanam.$id), TRUE)["pengaturan"][0]["set_nutrisi"];
            $setPh = json_decode(file_get_contents( $apiTanam.$id), TRUE)["pengaturan"][0]["set_ph"];
            $setVolume = json_decode(file_get_contents( $apiTanam.$id), TRUE)["pengaturan"][0]["set_volume"];
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai <b>".$name." ".$name2."</b>,%0a<em>ID Product : ".$idProduct."</em>%0a%0aSaat ini kamu sedang menanam ".$jenisTanaman.", ditanam pada ".$tglTanam.". ".$jenisTanaman." milikmu dapat dipanen segera pada ".$tglPanen.".%0a%0aPengaturan saat ini suhu air diatur pada ".$setSuhu." derajat Celcius, Electrical Conductivity (EC) sebesar ".$setNutrisi." dan pH air ".$setPh." dalam ".$setVolume." liter air.%0a%0a<b>Note :</b>%0aNilai pengaturan EC untuk kebutuhan nutrisi tanaman akan berubah setiap minggunya mengikuti umur tanaman dan kebutuhan nutrisinya.%0a%0a<b>Hijau Berseri</b>%0a<em>Bertanam untuk hidup yang lebih sehat</em>.%0ahttps://hijauberseri.com&parse_mode=HTML");
            }
            else{
                file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai ".$name." ".$name2.",%0a%0aSepertinya kamu lupa menuliskan id_product alatmu setelah kata perintah /info%0a%0aformat yang benar adalah :%0a<b>/info id_product</b>%0a%0aid_product sesuaikan dengan id_product alat kontrol hidroponik milikmu.&parse_mode=HTML");
            }


            //say
        
        }
        if (strpos($message, "Halo") === 0||strpos($message, "halo") === 0) {
        
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai <b>".$name." ".$name2."</b>&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Hai") === 0||strpos($message, "Hai") === 0) {
        
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Halo <b>".$name." ".$name2."</b>&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Apa kabar") === 0||strpos($message, "Apa kabar ?") === 0||strpos($message, "apa kabar") === 0||strpos($message, "apa kabar ?") === 0) {
    
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Kabarku baik, bagaimana kabarmu ?&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Apa aku ganteng ?") === 0||strpos($message, "apa aku ganteng ?") === 0||strpos($message, "Aku ganteng ?") === 0) {
    
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Tentu, kamu ganteng sekali&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Apa aku cantik ?") === 0||strpos($message, "apa aku cantik?") === 0||strpos($message, "Aku cantik ?") === 0||strpos($message, "aku cantik ?") === 0) {
    
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Kamu jelek kok...hahaha&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Kamu sudah makan ?") === 0) {
    
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Sudah kok, kamu jangan lupa makan ya&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Aku sidang maret") === 0) {
    
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Semangat ya untuk kamu, pasti bisa kok&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Kamu jangan error ya") === 0) {
    
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Insyaallah yang terbaik untukmu amin..&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }
        if (strpos($message, "Sayang ?") === 0||strpos($message, "Sayang") === 0) {
    
            file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Apa sih sayang...&parse_mode=HTML");
            
            //file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Hai".$chat_id."cuaca saat ini ".$weather."&parse_mode=HTML");
        }

        // else{

        //     file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Aku gapaham maksud perkataanmu&parse_mode=HTML");
        // }
 
      
            
    }
 
    
}