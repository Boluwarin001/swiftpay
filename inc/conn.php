<?php 


 date_default_timezone_set('Africa/Lagos');


// if (!@mysql_connect('localhost', 'root', '') or !@mysql_select_db('final')){
// 	die ('Could not connect to database'); 

// 	}

// $password = "EohsEN[Yx!eq";
$password='';
$con = mysqli_connect("localhost","root",$password,"cashflo");


mysqli_select_db($con, 'cashflo');

ob_start();
session_start();

 ?>