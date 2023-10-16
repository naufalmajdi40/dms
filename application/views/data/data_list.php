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
        <li class="active">Disturbance Record Table</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div  class="box">        
        <div  class="box-body">
		
	
			
				<center><legend>Disturbance Record Table</legend></center>

    <div class="row">
  <div class="col-md-8">
     <Label>Search by Date Range</Label>
		<div class="input-group input-daterange">
			<input type="text" class="form-control date-range-filter" placeholder="Date Start" data-date-format="mm-dd-yyyy" id="min" />
			<span class="input-group-addon">to</span>
			<input type="text" class="form-control date-range-filter" placeholder="Date End" data-date-format="mm-dd-yyyy" id="max"/>
		</div>
	</div></div>
  <br>
        
			<table id="example2" class="table table-bordered table-hoverd example" style="margin-bottom: 10px;">
			<thead>
				<tr>
					<th>Date</th>
					<th>Time</th>
					<th>Machine Code</th>
                    <th>Device</th>
					<th>Relay</th>
					<th>Relay ID</th>
					<th>Rack Location</th>
					<th>Status</th>
					<th>DR Files</th>
					
				</tr>
			</thead>
				<?php
				  $no=1; // Nomor urut dalam menampilkan data
				  $jumlahSks=0; // Jumlah SKS dimulai dari 0
				  $i = 0;
				  // Menampilkan data KRS
				  foreach(array_reverse($sensor_data) as $i => $data ){
					// if ($i++ >= 10) break;
				
					
				?>
				<tr>
					 <td><?php $cobaTanggal = date_create($data->tanggal); echo date_format($cobaTanggal,"Y/m/d"); ?></td>
					 <td><?php echo $data->waktu; ?></td>
					 <td><?php echo $data->machine_code; ?></td>
                     <td><?php if($data->port_type==0){echo "Port Number ".$data->description;} else{echo "IP".$data->description;}  ?></td>
                     <td><?php echo $data->type; ?></td>
					 <td><?php echo $data->relay_id; ?></td>
					 <td><?php echo $data->lokasi; ?></td>
					 <td>
						<?php 
							echo $data->status;
								//  $jumlahSks+=$krs->sks;
						?>
						
					 </td>
					 <td style="text-align:center" width="120px">
					 <button type="button" onclick="location.href='dr_files/<?php echo $data->nama_file; ?>.zip'"  class="btn btn-warning" ><i class="fa fa-download" aria-hidden="true"></i> Download</button>
						
					</td>
				</tr>
				<?php
				 
				} 
		
				?>
				
				</div>  
			  </table >    </div>  
   



	<script>
  $(function () {

    $('#example2').DataTable({
	    "order": [[ 0, "desc" ]],
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
    })
    $('.input-daterange input').each(function() {
	  $(this).datepicker('clearDates');
	});

	// Extend dataTables search
	$.fn.dataTable.ext.search.push(
	  function(settings, data, dataIndex) {
		var min = $('#min').val();
		var max = $('#max').val();
		var createdAt = data[0] || 0; // Our date column in the table

		if (
		  (min == "" || max == "") ||
		  (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
		) {
		  return true;
		}
		return false;
	  }
	);

	// Re-draw the table when the a date range filter changes
	$('.date-range-filter').change(function() {
		var table = $('#example2').DataTable();
	  table.draw();
	});


	$('.date-range-filter').datepicker();
  })
</script>


<script>

$(function() {
	// Bootstrap datepicker
	
});
</script>






	
		

		

		
		

		