<!-------------------------------------------------------*/
/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */
/*-------------------------------------------------------->
<section class="content-header">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


       <h3 style="margin-top:5px;">
	   	Device Monitoring System
       <small>Bring Live Your Device</small>
      </h3>
      <!--<h3 style="margin-top:-12px; margin-bottom:15px;"><small>smart planting system, for a better life</small></h3>-->
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Table Disturbance Record</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div  class="box">        
        <div  class="box-body">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Disturbance Record</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Device</th>
                  <th>Relay Type</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Time</th>
                  <th>Location</th>
                </tr>
                <?php foreach($disturbance_data as $data){?>
                <tr>
                  <td><?php echo $data->type?></td>
                  <td><?php echo $data->type?></td>
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
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
	
		</div>  
    </div>  


								  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
	  "order": [[ 0, "desc" ]],
    //   'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>






	
		

		

		
		

		