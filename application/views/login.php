<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Device Monitoring System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/green.css')?>">
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="
background-image:
   linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(19 117 67 / 73%)),
    url('images/background.jpg');
    width: 100%;
    height: 400px;
    background-size: cover;
    color: white;
    background-attachment: fixed;
    padding: 20px;


">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div style="text-align:center; margin-bottom:18px"><img width="120px" src="./images/favicon.ico"></div>  
  <div class="login-logo">
    <a href="index.php"><b>PLN</b></a>
    <h4 style="margin-top:0px; margin-bottom:30px; font-weight:500">Device Monitoring System</h4>
  </div> 	 
    <form action="<?php echo base_url('login/proses'); ?>" method="post"> 
	<div class="row">		
		<?php
			// Validasi error, jika username atau password tidak cocok
			if (validation_errors() || $this->session->flashdata('result_login')) {
		?>
			<div class="alert alert-danger animated fadeInDown" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Peringatan!</strong>
					<?php 
						// Menampilkan error
						echo validation_errors(); 
						// Session data users 
					    echo $this->session->flashdata('result_login'); ?>
			</div> 
		<?php 
			} 
		?>		
	 </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" autofocus="true">
        <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"  id="btn_login"  class="btn bg-green btn-block btn-flat">Sign In</button>
        </div>

        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
