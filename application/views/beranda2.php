<!-------------------------------------------------------*/
/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */
/*-------------------------------------------------------->
<?php
	ini_set('display_errors', '0');
    ini_set('error_reporting', E_ALL);
?>
  
    <!-- Content Header (Page header) -->

    <section class="content-header">


<script src="<?php echo base_url('assets/bower_components/grafik/jquery-3.4.0.min.js')?>"></script>


<script type="text/javascript">
    setInterval("cuacaUpdate();",2000); 
    function cuacaUpdate(){
      $('#refreshh').load(location.href + ' #updateTable');
    }
  </script>

<script type="text/javascript">
    setInterval("scriptUpdate();",2000); 
    function scriptUpdate(){
      $('#refresh').load(location.href + ' #update');
      // $('#refreshh').load(location.href + ' #updatee');
      // $('#refreshGambar').load(location.href + ' #updateGambar');
      $("#responsecontainer").load("<?php echo base_url().'grafik'; ?>");
      $("#pie").load("<?php echo base_url().'pie'; ?>");
    }
  </script>

  






      <h3 style="margin-top:5px; font-size:18.5px">
	     	Device Monitoring System
       <small>Bring Live Your Device</small>
      </h3>
     

      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
       <?php if($login=='T'){ ?>
	
			 <div class="row">
        <div class="col-sm-8">
             <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-info-circle"></i>  Dear <?php echo $username ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	    <ul>
              <li> Sepertinya Anda belum mengganti password pada menu <b>user</b>, demi keamanan maka perbarui password Anda. </li>
	      <li> Jangan lupa lengkapi data pribadi Anda pada menu <b>Data .</b> </li>
	    <ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->   <?php } ?>
      

    
      

<!-- =========================================================================================================== -->
 <!-- Info boxes -->
<!-- <div class="box-header with-border" style="background-color:#ffffff; border-radius:10px; margin-bottom: 10px;">
			  <h3 class="box-title"><i class="fa fa-area-chart"></i>  Monitoring Panel</h3>
			</div> -->

 

 <div class="clearfix visible-sm-block"></div>

 <div  class="row">
           <!-- /.col (LEFT) -->
        <div  class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Coverage Area</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?php 
           
              

                 $kodePemetaan= array();
                  $kodeHasil =  array();
                  foreach($pemetaan as $value){
                    array_push($kodePemetaan, $value->machine_code);
                  }

                  foreach($countDisturbance as $dataajahh){
                    array_push($kodeHasil, $dataajahh->machine_code);
                  }

                  $result=array_diff($kodePemetaan,$kodeHasil);

              
              ?>
              <div id="map" style="height:450px"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          </div>

  <!-- TABLE: LATEST ORDERS -->
  <div id="refresh"  class="row">
 
        
        <div id="update" class="col-md-6 col-sm-6 col-xs-12">
        <a style="color:black;" href="<?php echo site_url('data_per_day') ?>">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="ion ion-ios-pulse"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total diturbance</span>
              <span class="info-box-number"><?php  echo $disturbanceDay." Disturbance/day"; ?></span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->

          

        <div id="update" class="col-md-6 col-sm-6 col-xs-12">
          <a style="color:black;" href="<?php echo site_url('notification') ?>">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-send"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Telegram Notification</span>
              <span class="info-box-number"><?php echo $notif; ?> User Active</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->
        
        </div>

        <div  class="row">
           <!-- /.col (LEFT) -->
        <div  class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Disturbance Record per Month</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <!-- <canvas id="lineChart" style="height:250px"></canvas> -->
                <div id="responsecontainer"></div>
            
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

         <div id="refreshh"> 
        <div id="updateTable" class="col-md-6">
         <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Records</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Device</th>
                    <th>Relay Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Rack Location</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 0; foreach(array_reverse($sensor_data)  as $data)
				          { ?>
                  <tr>
                    <td><?php echo $data->machine_code; ?></td>
                    <td><?php echo $data->type; ?></td>
                    <td><?php if($data->port_type==0){echo "Port Number ".$data->description;} else {echo "IP ".$data->description;} ?></td>
                    <?php $dataStatus = ucwords($data->status); 
                      if($dataStatus=="Healthy"){ ?>
                    <td><span class="label label-success">Healthy</span></td>
                    <?php } 
                    else{ ?>
                    <td><span class="label label-danger">Trip and Alarm</span></td>
                    <?php } ?>
                    <td>
                    <?php echo $data->tanggal." ".$data->waktu." WIB"; ?>
                      <!-- <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div> -->
                    </td>
                    <td><?php echo $data->lokasi; ?></td>
                  </tr>

                  <?php if(++$i >= 6) break; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="data" class="btn btn-sm btn-warning btn-flat pull-right">View All Records</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        
        
        </div>
      
      <!-- /.row -->
	  <div class="box-footer" style="text-align:center">
         DMS &copy<a href=""><strong> PT. Micronet Gigatech Indoglobal</strong></a> 2021
    </div>

<!-- =========================================================================================================== -->


  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <br>
    <!-- <strong></strong> -->
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>


<script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>



<script src="<?php echo base_url('assets/bower_components/chart.js/Chart.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>

<script src="<?php echo base_url('assets/bower_components/grafik/jquery-3.4.0.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/grafik/mdb.min.js')?>"></script>


<!-- AdminLTE for demo purposes -->
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js')?>"></script>

<script>
  var HubIcon = L.Icon.extend({
    options: {
       iconSize:     [29, 30],
       iconAnchor:   [22, 39],
       shadowAnchor: [4, 62],
       popupAnchor:  [-3, -40]
    }
});
var greenIcon = new HubIcon({
    iconUrl: 'assets/img/device.png'
});

var redIcon = new HubIcon({
    iconUrl: 'assets/img/device2.png'
});

	var map = L.map('map').setView([-1.766654, 117.347558], 5);

  var customOptions =
        {
        'maxWidth': '680px',
        'className' : 'custom'
        };

  


	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		id: 'mapbox/light-v10',
	}).addTo(map);


	<?php date_default_timezone_set('Asia/Jakarta');
		$tanggal= date('Y-m-d'); 
    

    
 

    foreach ($pemetaan as $value) { 
      foreach($result as $a=>$hasil){
       if($value->machine_code == $hasil){
         $find=0;
       }
      }
      echo $value->latitude;  
      foreach($countDisturbance as $codeDisturbance){ 
        if($codeDisturbance->machine_code == $value->machine_code){
          $find = $codeDisturbance->jumlah;}
          } 
           
        if($find>0){$image="redIcon";}else{$image="greenIcon";}?>


var customPopup = "<div style='width:300px;' class='card w-75'><div class='card-body'><h5 class='card-title'>"+<?= '"'.$value->device_name.'"' ?>+"</h5><ul class='list-group list-group-flush'><li class='list-group-item'>Machine Code<span class='badge bg-primary rounded-pill'>"+<?= '"'.$value->machine_code.'"' ?>+"</span></li><li class='list-group-item'>Location<span class='badge bg-primary rounded-pill'>"+<?= '"'.$value->location.'"' ?>+"</span></li><li class='list-group-item'>Disturbance Today : <span class='badge bg-primary rounded-pill'>"+<?= '"'.$find.'"' ?>+"</span></li></ul><a style='color:white;' href='/dms/device/index/"+<?= '"'.$value->machine_code.'"' ?>+"' class='btn btn-primary'>Detail</a></div></div>";
		L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
        icon: <?= $image ?>,
				radius: 90000,
				color: 'red',
				fillColor: 'red',
				fillOpacity: 0.5,
			}).bindPopup(customPopup,customOptions)
			.addTo(map);

	<?php }  ?>
</script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

</body>
</html>
