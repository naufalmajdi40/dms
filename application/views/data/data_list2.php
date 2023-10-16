<!-------------------------------------------------------*/
/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */
/*-------------------------------------------------------->
<section class="content-header">
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>




       <h3 style="margin-top:5px;">
	   	Device Monitoring System
      </h3>
      <!-- <h3 style="margin-top:-12px; margin-bottom:15px;"><small>smart planting system, for a better life</small></h3> -->
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
		
			<!-- Form KRS-->
			
				<center><legend>Table Disturbance Record</legend></center>
		
		
			<br />
			<div class="col-md-2">
				  <span>Pilih dari tanggal</span>
				  <div class="input-group">
				    <input type="text" class="form-control pickdate date_range_filter" name="" >
				    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
				  </div>
				</div>
				<div class="col-md-2">
				  <span>Sampai tanggal</span>
				  <div class="input-group">
				    <input type="text" class="form-control pickdate date_range_filter2" name="">
				    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
				  </div>
				</div>
		
			<table id="example2" class="table table-bordered table-hoverd example" style="margin-bottom: 10px;">
			<thead>
				<tr>
					<th>TANGGAL</th>
					<th>RELAY ID</th>
					<th>LOKASI</th>
					<th>STATUS</th>
					<th>DR FILES</th>
					
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
					 <td><?php echo $data->waktu; ?></td>
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
  $(document).ready(function() {
  
    $('#example2').DataTable({
	  "order": [[ 0, "desc" ]],
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
	$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
			  var min = $('.date_range_filter').val();
			  var max = $('.date_range_filter2').val();
			  var createdAt = data[0];  // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
			  if (
			    (min == "" || max == "") ||
			    (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
			  ) {
			    return true;
			  }
			  return false;
			}
		);
	    $('.pickdate').each(function() {
	        $(this).datepicker({format: 'mm/dd/yyyy'});
	     });
		$('.pickdate').change(function() {
	        table.draw();
	    });	
  });
</script>
<!-- <script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</script> -->





	
		

		

		
		

		