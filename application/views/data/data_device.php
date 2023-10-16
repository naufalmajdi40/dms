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
		<div class="container-fluid">
			<div class="box">
      <center><legend>Monitoring list Table</legend></center>

				
            <div class="card card-primary card-outline card-tabs">
              
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-home-tab">
                  <div class="tab-pane active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
				<div style="margin:30px;">
					<?php //var_dump($data);?>
					<table id="" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                 
				 <thead>
				   <tr role="row">
					 <th style ="width:1%">No</th>
					 <th>Device Name</th>
					
           <th class="sorting">GI Name</th>
					 <th class="sorting">Location</th>
					 <th  class="sorting" style ="width:10%">Action</th></tr>
				   </thead>
				   <tbody>
            <?php
            $no=1;
            foreach($data->result_array() as $i):?>
            <tr>
                <th><?php echo $no++;?></th>
                <th><?php echo $i['device_name'];?></th>
                 <td><?php echo $i['gi_name']; ?></a></td>
                 <td><?php echo $i['location']; ?></a></td>
                 <td ><button class="btn btn-primary " onClick="save()"><i class="fas fa-cog"></i></button>&nbsp<button class="btn btn-danger "><i class="fas fa-trash"></i></button></td>
                         
            </tr>
              <?php endforeach;?>
					</tbody>
</table>
					
					
						
					<br>
				</div>
				</div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
				
		</div>
	  
	  <br>
      <div  >        
<script>

</script>






	
		

		

		
		

		