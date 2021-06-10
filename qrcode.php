<?php 
require_once("inc/conn.php"); 
require_once("inc/functions.php"); 

$page='qrcode';
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

	$time=time();
	$unique=uniqid();

	$agg_pass=0;

	if($_SESSION['type']=='aggregator'){

		$s_sql="SELECT referral_code FROM tbl_aggregator ORDER BY id DESC LIMIT 1";
		if($qqery=mysqli_query($con,$s_sql)){
			$m_code = mysqli_fetch_row($qqery)[0];
			if(!$m_code or $m_code==''){
				$m_code='00000000000';
			}
			$m_code++;

			$sql="INSERT INTO tbl_aggregator ( business_name, address, state, lga, phone, email_address, password, bank_name, account_name, account_number, referral_code, time_id)
			VALUES ('$business_name', '$business_address', '$state', '$lga', '$phone', '$email', '$password', '$bank', '$acc_name', '$acc_number', '$m_code', '$time')";

				if($query=mysqli_query($con, $sql)){
					$agg_pass=1;
				}

			}
	}
	else{
		$s_sql="SELECT merchant_code FROM tbl_merchant ORDER BY id DESC LIMIT 1";
		if($qqery=mysqli_query($con,$s_sql)){
			$m_code = mysqli_fetch_row($qqery)[0];
			if(!$m_code or $m_code==''){
				$m_code='AAA000000AAA';
			}
			$m_code++;

			$sql="INSERT INTO tbl_merchant ( business_name, address, state, lga, coupon_code, referral_code, phone, email_address, password, bank_name, account_name, account_number, merchant_code, time_id)
			VALUES ('$business_name', '$business_address', '$state', '$lga', '$coupon', '$ref_code', '$phone', '$email', '$password', '$bank', '$acc_name', '$acc_number', '$m_code', '$time')";

				if($query=mysqli_query($con, $sql)){

				$bml=strlen($business_name) + 2;
				$bal=strlen($business_address) + 2;
				$sl=strlen($state) + 2;

				$qrdata="BUN".$bml."($business_name)ADD".$bal."($business_address)STA".$sl."($state)MEC12".$m_code;

				include_once('lib/qrlib.php'); 

		     	$filename=str_replace(' ', '_', trim($business_name)).'_'.$unique.'.png'; 
			    $tempDir = "temp/"; 
			     

			    QRcode::png($qrdata, $tempDir.$filename, QR_ECLEVEL_L, 4); 
			    $img_loc="temp/".$filename;

			    	unset($_SESSION['signup-1']);
					unset($_SESSION['signup-2']);
					session_destroy();

				}else{
					die('Something went wrong');
				}
				
		}else{die('Error Generating Merchant Code');}

	}


?>
	<div class="gradient wallpaper">
		<div class="walltext">
		<div class="wall-text1"><?php if ($_SESSION['type']=='aggregator'){echo 'Aggregator';}else{echo 'Merchant';} ?></div>
		</div>
	</div>

	<div class="s-content">
	<div class="s-content-pad">

		<div class="s-header">
			<div class="s-line" style="background: #ec5756;"></div>

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

			<div class="s-circle s-circle2" style="float: right;background: #ec5756;color: #fff">
				<div class="s-inner-c" style="margin-left: 0px;background: #ec5756">
					<div class="s-inner-c-pad">3</div>
				</div></div>
			</center>

		</div>

		<div class="s-text-header">
			<div class="s-t-h s-t-h-active" style="text-align: center;width: 100%">Registration Successful</div>
		</div>

		<div class="clearfix"></div>
		<br>

			<?php if($_SESSION['type']=='aggregator'){ ?>
			<div class="s-title-confirm" style="font-size: 16px !important;">Your Referral Code</div>
			<div class="s-title-confirm" style="font-size: 20px !important;color: black;font-weight: bolder;" ><?php echo sprintf("%08d", $m_code); ?></div>
			<br>
			<br>
			<br>
				<?php }else{ ?>
			<div class="s-title-confirm" style="font-size: 16px !important;">Your Merchant Code</div>
			<br>
			<br>
			<br>
				<center>

					<img class="qr-code" src="<?php echo $img_loc; ?>">

				</center>
			
			<a href="<?php echo $img_loc;?>"><div class="s-submit">Download QR code</div></a>
			<?php } ?>

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