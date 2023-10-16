<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Oops! 404 Hijau Berseri </title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px 0px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

/* 
a {
	color: #003399;
	text-align: center;
	background-color: transparent;
	font-weight: normal;
} */
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  border-radius:5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 25px;
  margin: 5px 2px 40px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #636f6c;
}

.button1:hover {
  background-color: #15b39a;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}


@media all and (max-width:30em){
 .button1{
  display:block;
  margin:0.4em auto;
 }
}



h1 {
	color: #444;
	background-color: transparent;
	font-size: 50px;
	text-align: center;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}
h2 {
	color: #444;
	background-color: transparent;
	font-size: 30px;
	text-align: center;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 5px 15px 30px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 10px 10px 12px 10px;
}

#container {
	margin: 70px 70px 0px 70px;
	/* border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0; */
}
#container2 {
	margin: 0px 150px 0 150px;
	margin-bottom:0px;
	/* border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0; */
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div id="container">
		<h1>Sepertinya Kita Tersesat</h1>
		<center><button class="button button1" onclick="window.location.href='./beranda'">Kembali</button></center>
		
	</div>
	<div id="container2">
		<img src="/dms/images/./404.png" alt="" width="100%"></div>
</body>
</html>