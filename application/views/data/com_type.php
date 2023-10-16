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

				
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0 bg-primary">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active text-gray" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Communication Type</a>
                  </li>
				  <li class="nav-item">
                    <a class="nav-link active text-gray" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Communication Data</a>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-home-tab">
                  <div class="tab-pane active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
				<div style="margin:30px;">
				  <label for="">Select Communication Type</label>
        
          
				  <select name="" id="config" >
          <?php
          foreach($data->result_array() as $i):?>
							<option value="<?php echo $i['id_com'];?>" <?php if($i['id_com']==$i['com']){echo 'selected';}?>><?php echo $i['name'];?></option>
            <?php endforeach;?>
					</select>
					<br>
					<button class="btn btn-primary " style="width:135px" onClick="save()">
						Save &nbsp<i class="fa fa-envelope"></i>
					</button>
					
					<hr>
					<br>
						
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
function save(){
 data= $('#config').val();
 $.get("com/save_com?com="+data,(res)=>{
      alert(res)
 })

}
</script>






	
		

		

		
		

		