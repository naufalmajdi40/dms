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
        <li class="active">Proses Tanam</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input atau edit Users -->
			
			<div class="alert alert alert-dismissible" style="background-color:rgb(192, 236, 216); color:rgb(0, 156, 87);">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="far fa-bell"></i>  Notifikasi sedang aktif !</h4>
                Kamu akan mendapatkan notifikasi jika tanamanmu siap dipanen, juga ketika botol nutrisi dan pH sedang habis. Notifikasi dikirim melalui email dan telegram milikmu.
              </div>
			<form action="<?php echo $action; ?>" method="post">

			<div class="row">
			<div class="form-group col-md-6 mb-3">
			<label for="varchar">Latitude</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="fas fa-map-marker-alt"></i>
                  </div>
					<input readonly style="background-color:white" type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" />
				</div>	</div>

				<div class="form-group col-md-6 mb-3">
			<label for="varchar">Longitude</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="fas fa-map-marker"></i>
                  </div>
					<input readonly style="background-color:white" type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
				</div>	</div>
				</div>
          
				<div class="form-group">
			<label for="varchar">Alamat Email</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="far fa-envelope"></i>
                  </div>
					<input readonly style="background-color:white" type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
				</div>	</div>
				
				
				<div class="form-group">
			<label for="varchar">Chat ID Telegram</label>	
			<div class="input-group">
				<div class="input-group-addon">
				<i class="fab fa-telegram"></i>
                  </div>
					<input readonly style="background-color:white" type="text" class="form-control" name="chat_id" id="email" placeholder="Chat ID Telegram" value="<?php echo $chat_id; ?>" />
				</div></div>		
		
				
				<button type="submit" class="btn btn-danger"><?php echo $button ?></button>
				<a href="<?php echo site_url('notifikasi/notifikasi_action') ?>" class="btn btn-warning">Ubah</a>
				
			
			</form>
			
    