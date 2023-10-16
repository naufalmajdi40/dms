<!-------------------------------------------------------*/
/* Copyright   : Amin Rusydi                             */
/* Publish     : Teknik Mekatronika                      */
/*-------------------------------------------------------->





<section class="content-header">
        <h3 style="margin-top:5px;">
	   	Hydroponics Monitoring System
      </h3>
      <h3 style="margin-top:-12px; margin-bottom:15px;"><small>smart planting system, for a better life</small></h3>
      <ol class="breadcrumb">
        <li><a href="../admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Users</a></li>
        <li class="active">Memulai Tanam</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   
      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input atau edit Users -->
			<h4 style="margin-top:0px; margin-bottom:20px">Pengaturan Notifikasi</h4>
			<div class="alert alert alert-dismissible" style="background-color:rgb(255, 228, 196);color:#b7690d;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Hai <b><?php echo $nama ?></b>, <br>
				Saat ini notifikasi hanya dapat dihubungkan melalui email dan telegram saja. Isi form berikut untuk mengaktifkan notifikasi dari email dan telegram milikmu.
			  </div>
			  <!-- <p>Click the button to get your coordinates.</p>
			  <button onclick="getLocation()">Try It</button> -->
			  <div class="alert alert alert-dismissible" style="background-color:rgb(230 230 230);color:#b7690d;">
			  <button onclick="getLocation()"  class="btn bg-orange">Lokasi Anda</button> <button class="btn" disabled>Klik untuk mendapatkan koordinat lokasi saat ini</button>
			  </div>
			  
			<form role="form" action="<?php echo $action; ?>" method="post">
			
			<div class="row">
			<div class="form-group col-md-6 mb-3">
			<label for="varchar">Latitude</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="fas fa-map-marker-alt"></i>
                  </div>
					<input style="background-color:white" type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" />
				</div>	</div>

				<div class="form-group col-md-6 mb-3">
			<label for="varchar">Longitude</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="fas fa-map-marker"></i>
                  </div>
					<input style="background-color:white" type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
				</div>	</div>
				</div>
          
				<div class="form-group">
			<label for="varchar">Alamat Email</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="far fa-envelope"></i>
                  </div>
					<input style="background-color:white" type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
				</div>	</div>
				
				
				<div class="form-group">
			<label for="varchar">Chat ID Telegram</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="fab fa-telegram"></i>
                  </div>
					<input style="background-color:white" type="text" class="form-control" name="chat_id" id="email" placeholder="Chat ID Telegram" value="<?php echo $chat_id; ?>" />
				</div></div>	
				
				<button type="submit" class="btn bg-green"><?php echo $button ?></button> 
			
			</form>



			<script>
//  var x = document.getElementById("lokasi");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 
}

function showPosition(position) {
//  x.innerHTML = "Latitude: " + position.coords.latitude + 
 // "<br>Longitude: " + position.coords.longitude;
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;

   document.getElementById("latitude").value= latitude;
   document.getElementById("longitude").value= longitude;

}
</script>	