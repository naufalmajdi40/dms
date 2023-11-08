<!-------------------------------------------------------*/
/* Copyright   : Amin Rusydi                             */
/* Hayooooooooooo Ngintip ajah nih.......               */
/*-------------------------------------------------------->
<section class="content-header">
<style>
.l-red{
 
  color:#dc3545;
  background-color:#dc3545;
  border-radius:100px;
  box-shadow: 0px 0px 10px 3px #dc3545;
}
.l-yellow{
  color:yellow;
}
.l-green{
  color:#28a745
}
.l-second{
  color:#6c757d;
 
}
</style>
<script src="<?php echo base_url('assets/bower_components/grafik/jquery-3.4.0.min.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.2/mqttws31.min.js"></script>
  <script src="<?php echo base_url('assets/js/mon-mqtt.js') ?>"></script>



       <h3 style="margin-top:5px;">
	   	Device Monitoring System
       <small>Bring Live Your Device</small>
      </h3>
      <p><?php  ?></p>
      <!--<h3 style="margin-top:-12px; margin-bottom:15px;"><small>smart planting system, for a better life</small></h3>-->
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Disturbance Record Table</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <input type="text" hidden id="mon_data">
		<div class="container-fluid" id="drag">
        <!--  device content -->
      <?php $no=1;
        foreach($data->result_array() as $i):?>
      <div class=" bx_<?php echo $i["machine_code"].'_'.$i["id_device"];?> hide" id="<?php echo $i["machine_code"].'_'.$i["no"];?>" style="display: inline-block; margin-right:5px;margin-top:-12px"  >
        <div class="box ">
          <div class="box-header with-border">
              <span><b><?php echo $i["device_name"];echo '-'.$i["type"] ?></b>,</span>
              <?php $rack = str_replace("#",",",$i["rack_location"]);
              ?>
              <span class=""><?php echo $rack; ?></span>
            <div class="box-tools pull-right">
            </div>
          </div>
            <div class="info-box" style="border-radius: 10px;display: flex;"  id="<?php echo 'box'.$i["machine_code"].'_'.$i["id_device"];?>">
              <!-- <div style="width:80px;margin:10px;text-align:center;"> 
                 <div id="perIECC" class="gauge" style=" margin: 0 auto;width: 70px; --rotation:0deg; --color:#5cb85c; --background:#e9ecef;">
                  <div class="percentage"></div>
                  <div class="mask"></div>
                  <span class="value"></span>
                </div>
                <span class="label label-primary"> &nbsp</span>
                 </div> -->

            </div>
          </div> 
        </div>
<?php endforeach;?>
        </section>
  <!-- ending device content -->
      <!-- /////////////////////////////////////////////////////////////////// -->
      <div hidden class="container-fluid">
			<div class="box">
      <center><legend>Data monitoring list </legend></center>

				
            <div class="card card-primary card-outline card-tabs">
              
              <div class="card-body" style="">
              <ol  id="sortable" style="display:flex;flex-direction: column;" class="dt_list" >
            
              </ol>

                <br>
        </div>
        </div>
        </div>
      
					
					
					
						
    
 


    <!--  ///////////////////////////////////////////////////////////////////////// -->





	  <br>

       
	  <br>
    <br>
    <div>
<script>
  //http://localhost/dms/mon/dashboardmon
  
  readDevice()
  
function readDevice(){
  $.get("apiReadMon",(res)=>{
    $(`#mon_data`).val(res)
    dt = JSON.parse(res)
    buf= dt.data
    console.log(dt)
    for(let i =0 ; i<buf.length;i++){
     
      if(buf[i].data_type=="float" || buf[i].data_type=="integer"){
        let itemgg=`<div style="width:75px;margin:7px;text-align:center;"> 
                      <div id="gg_${buf[i].machine_code}_${buf[i].id_device}_${buf[i].alias}" class="gauge" style="width: 75px; --rotation:0deg; --color:#5cb85c; --background:#e9ecef;"">
                  
                      <div class="percentage"></div>
                        <div class="mask"></div>
                        <b><span class="value" id="val_${buf[i].machine_code}_${buf[i].id_device}_${buf[i].alias}">0</span></b>
                      </div>

                      <span class="label label-success">${buf[i].name}</span>
                    </div>`
          $(`.bx_${buf[i].machine_code}_${buf[i].id_device}`).removeClass('hide')    
          $(`#box${buf[i].machine_code}_${buf[i].id_device}`).append(itemgg)
        }
        else if(buf[i].data_type=="boolean"){
          let itemgg=`<div style="width:75px;margin-top:7px;text-align:center;"> 
                      <div id="gg_${buf[i].machine_code}_${buf[i].id_device}_${buf[i].alias}" style="width: 75px; --rotation:0deg; --color:#5cb85c; --background:#e9ecef;"">
                        <i class="fas fa-circle l-second ll_${buf[i].machine_code}_${buf[i].id_device}_${buf[i].alias}" style="font-size:25px;margin-top:5px;margin-bottom:8px;"></i>
                      <div class="percentage"></div>
                        <div class="mask"></div>
                        <b><span hidden class="value" id="val_${buf[i].machine_code}_${buf[i].id_device}_${buf[i].alias}">0</span></b>
                      </div>

                      <span class="label label-danger">${buf[i].name}</span>
                    </div>`
          $(`.bx_${buf[i].machine_code}_${buf[i].id_device}`).removeClass('hide')    
          $(`#box${buf[i].machine_code}_${buf[i].id_device}`).append(itemgg)
        }
        else if(buf[i].data_type=="visible-string"){
          let itemgg=`<div style="max-width:150px;margin-left:10px;margin-right:5px;margin-top:5px;word-wrap: break-word;text-align:center;"> 
                      <div id="txt_${buf[i].machine_code}_${buf[i].id_device}_${buf[i].alias}" style=" --rotation:0deg; --color:#5cb85c; --background:#e9ecef;">
                        <br><br>   
                      </div>
                      <span class="label label-primary">${buf[i].name}</span>
                      
                    </div>`
          $(`.bx_${buf[i].machine_code}_${buf[i].id_device}`).removeClass('hide')    
          $(`#box${buf[i].machine_code}_${buf[i].id_device}`).append(itemgg)
        }
        
        else if(buf[i].data_type=="utc-time"){
          let itemgg=`<div style="max-width:150px;margin-left:10px;margin-right:5px;margin-top:5px;word-wrap: break-word;text-align:center;"> 
                      <div id="txt_${buf[i].machine_code}_${buf[i].id_device}_${buf[i].alias}" style="--rotation:0deg; --color:#5cb85c; --background:#e9ecef;">
                        <br><br>   
                      </div>
                      <span class="label label-warning">${buf[i].name}</span>
                      
                    </div>`
          $(`.bx_${buf[i].machine_code}_${buf[i].id_device}`).removeClass('hide')    
          $(`#box${buf[i].machine_code}_${buf[i].id_device}`).append(itemgg)
        }
      }
      
    //console.log(buf)
  })
}
$(document).ready(function(e){
  $.get("../mon/apiReadMon", function(data, status){
    let dt = JSON.parse(data)
    console.log(dt)
    for (let i=0;i<dt.data.length;i++){
      console.log(dt.data[i])
      $('.dt_list').append(`<li id="${dt.data[i].machine_code}_${dt.data[i].im_mon_id}" style="font-size:20px;border-top:solid 1px black;border-bottom:solid 1px black;margin-right:30px;" border-bottom:solid 1px black"><b>${dt.data[i].device_name}</b>,${dt.data[i].type}  ,${dt.data[i].name}`)
   
    }
   //alert(data)
  });

     $( "#sortable" ).sortable({
      update: function(event, ui) {           
        let ids = $(this).children().get().map(function(el) {
        distance: 5
          return el.id
              }).join(",");

                console.log(ids)
                $.get( "updPosition2?data="+ids)
                    .done(function(data) {  
                     console.log(data)
                 });
                 
                }
     });
  $('#drag').sortable({
    update: function(event, ui) {           
        let ids = $(this).children().get().map(function(el) {
        distance: 5
          return el.id
              }).join(",");

                console.log(ids)
             
                  $.get( "updPosition?data="+ids)
                    .done(function(data) {  
                     console.log(data)
                 });
                              
       },
       start: function(event, ui) { 
           //console.log(ui)
       }

  })
  $( "#drag" ).disableSelection();
})
</script>






	
		

		

		
		

		