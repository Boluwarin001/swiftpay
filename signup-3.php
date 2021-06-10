<?php 

require_once("inc/conn.php"); 
require_once("inc/functions.php"); 

$page='signup-3';
include_once('header.php');

if(!isset($_SESSION['signup-2']) or empty($_SESSION['signup-2'])){
	header('Location: signup-2.php');
	exit();
}


	// FORMAT SIGNUP-1 business name <> business address <> state <> lga <> ref code <> coupon
	// FORMAT SIGNUP-2 phone <> email <> bank <> acc_name <> acc_number <> password

	$data1=$_SESSION['signup-1'];
	$data2=$_SESSION['signup-2'];

	$a=explode('<>', $data1);
	$b=explode('<>', $data2);

	$business_name=$a[0];
	$business_address=$a[1];
	$state=$a[2];
	$lga=$a[3];
	$ref_code=$a[4];
	$coupon=$a[5];

	$phone=$b[0];
	$email=$b[1];
	$bank=$b[2];
	$acc_name=$b[3];
	$acc_number=$b[4];
	$password=$b[5];

?>
	<div class="gradient wallpaper">
		<div class="walltext">
		<div class="wall-text1"><?php if ($_SESSION['type']=='aggregator'){echo 'Aggregator';}else{echo 'Merchant';} ?> SignUp</div>
		<div class="wall-text2">Please fill the form below to receive QR code 
to start accepting payments</div>
		</div>
	</div>

	<div class="s-content">
	<div class="s-content-pad">

		<div class="s-header">
			<div class="s-line" style="background: linear-gradient(90deg, #ec5756, #ec5756, #ec5756, #ff8417, #ff8417);"></div>
			<div class="s-circle s-circle2" style="float: left;">
				<div class="s-inner-c" style="background: #ec5756;color: #fff">
					<div class="s-inner-c-pad">1</div>
				</div>
			</div>

			<center><div class="s-circle s-circle2">
				<div class="s-inner-c s-i-grey" style="background: #ec5756;color: #fff">
					<div class="s-inner-c-pad">2</div>
				</div>
			</div>

			<div class="s-circle" style="float: right;background: #ff8417;">
				<div class="s-inner-c" style="margin-left: 0px">
					<div class="s-inner-c-pad">3</div>
				</div></div>
			</center>

		</div>

		<div class="s-text-header">
			<div class="s-t-h" style="width: 40%;">Information</div>
			<div class="s-t-h" style="width: 20%;">Details</div>
			<div class="s-t-h s-t-h-active" style="width: 40%;">&nbsp;&nbsp; Finish</div>
		</div>

		<div class="clearfix"></div>
		<br>

		<div class="s-form-pad">

			<div class="s-title-confirm">Confirm your details</div>
			<br>
			<br>
			<div class="s-confirm-box">
				<div>Business Name: <span><?php echo $business_name; ?></span></div>
				<div>Business Address: <span><?php echo $business_address; ?></span></div>
				<div>Select Your State: <span><?php echo $state; ?></span></div>
				<div>Select Your LGA: <span><?php echo $lga; ?></span></div>
				<div>Email: <span><?php echo $email; ?></span></div>
				<div>Phone Number: <span><?php echo aesdecrypt($phone); ?></span></div>
				<div>Bank Name:<span><?php echo $bank; ?></span></div>
				<div>Account Name: <span><?php echo $acc_name; ?></span></div>
				<div>Account Number: <span><?php echo aesdecrypt($acc_number); ?></span></div>

			</div>

			<div class="clearfix"></div>

			<form>
			<div class="checkdiv"> <input type="checkbox" name="agree" id="agree" class="checkbox">I Agree to the <a href="terms-merchant.php" style="font-weight: bolder;color: #333;text-decoration: none;">Terms and Conditions</a> to which I am signing up on SwiftPay.</a></div>
		</div>	
			</form>
			<a onclick="accept()" style="text-decoration: none;" class="s-submit">Submit</a>


			<script type="text/javascript">
			  function accept() {
			  	var a=document.getElementById('agree');
			        if (a.checked) {
			        	window.location.href="qrcode.php";
			        }else{
			        	alert('You Must Accept our Terms');
			        }
			    }
			</script>
		<br>
		<br>
		<a href="signup-1.php" style="text-decoration: none"><div style="color: #ec5756;text-align: center;">Go Back</div></a>


		<div class="clearfix"></div>
		<br>
		<br>

	</div>
	</div>



	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<?php include_once('footer.php'); ?>