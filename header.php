<?php



?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="SwiftPay Online Merchant Payment Solution">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" />

    <!-- <link rel="stylesheet" href="css/animate.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
	<title>SwiftPay</title>
</head>
<body>

    <div class="big-modal" id="modal" onclick="closeModal()">
    	<div class="close" id="close" onclick="closeModal()">X</div>
    	<div class="modal-body">
    		<a href="signup-1.php?page=merchant">
    		<div class="mod-box first-md">
    			<div class="mod-img-m mod-img"></div>
    			<div class="mod-txt">MERCHANT</div>
    		</div>
	    	</a>
	    	<a href="signup-1.php?page=aggregator">
    		<div class="mod-box">
    			<div class="mod-img-a mod-img"></div>
    			<div class="mod-txt">AGREGGATOR</div>
    		</div>
	    	</a>
		    		
    	</div>
    </div>

        <nav>
        <div class="gradient">    
        <div id="navs" class="nav">
            <div style="padding: 15px 40px">
  <a href="javascript:void(0);" style="font-size:20px;" class="icon" onclick="hamburger()">&#9776;</a>
            <a href="http://swiftpay.com.ng"><div class="logo"></div></a>
            <div id="navShow">
                <a href="faq.php"><div class="nav-item">FAQ</div></a>
                <a href="support.php"><div class="nav-item">Support</div></a>
                <a href="security.php"><div class="nav-item">Security</div></a>
                <a href="blog.php"><div class="nav-item">Blog</div></a>
                <div onclick="openModal()" class="nav-item">Sign up</div>
                <a href="about.php"><div class="nav-item">About</div></a>
                <a href="index.php"><div class="nav-item">Home</div></a>
            </div>
                <div class="clearfix"></div>
                </div>
            </div>
            </div>
        </nav>



    <script>
    	var modal = document.getElementById('modal');

    	modal.style.marginTop='-250%';

    	function openModal(){
    		modal.style.marginTop='0%';
    	}
    	function closeModal(){
    		modal.style.marginTop='-250%';
    	}
    </script>