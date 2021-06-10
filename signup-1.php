<?php 

require_once("inc/conn.php"); 
require_once("inc/functions.php"); 

$page='signup-1';
include_once('header.php');

$states=array(
	'Abia State',
'Adamawa State',
'Akwa Ibom State',
'Anambra State',
'Bauchi State',
'Bayelsa State',
'Benue State',
'Borno State',
'Cross River State',
'Delta State',
'Ebonyi State',
'Edo State',
'Ekiti State',
'Enugu State',
'FCT',
'Gombe State',
'Imo State',
'Jigawa State',
'Kaduna State',
'Kano State',
'Katsina State',
'Kebbi State',
'Kogi State',
'Kwara State',
'Lagos State',
'Nasarawa State',
'Niger State',
'Ogun State',
'Ondo State',
'Osun State',
'Oyo State',
'Plateau State',
'Rivers State',
'Sokoto State',
'Taraba State',
'Yobe State',
'Zamfara State'
);



function validateState($s){
	global $states;
	if(in_array($s, $states)){
		return $s;
	}else{
		return false;
	}
}


function validateLGA($sg,$lg){
	global $states;

	$d=file_get_contents('api/lga');
	$v=json_decode($d);

	$lgaf=false;

	foreach ($v as $key) {
			$stateGet=$key->state->name;
			$lgaGet=$key->state->locals;

			if($stateGet==$sg){
				foreach ($lgaGet as $lga) {
					if($lga->name==$lg){
						$lgaf=$lga->name;
						break;
					}
				}
				break;
			}
	}

	if($lgaf==false){
		return false;
	}else{
		return $lgaf;
	}
}


$errors=array();


if (post('business_name') and post('state') and post('business_address') and post('lga')) {
	$ref_code=post_to_null($_POST['ref_code']);
	$coupon=post_to_null($_POST['coupon']);

	$business_name=post('business_name');
	$business_address=post('business_address');
	$state=post('state');
	$lga=post('lga');

	// SAN EACH INPUT

	$business_name=san($business_name);
	$state=san($state);
	$business_address=san($business_address);
	$lga=san($lga);
	$ref_code=san($ref_code);
	$coupon=san($coupon);

	$pass=1;

	if(!validateState($state)){$pass=0;$errors[]="Invalid State";}
	if(!validateLGA($state, $lga)){$pass=0;$errors[]="Invalid Local Government Area";}

	if($pass==1){
		// FORMAT SIGNUP-1 business name <> business address <> state <> lga <> ref code <> coupon
		$sep="<>";
		$data=$business_name.$sep.$business_address.$sep.$state.$sep.$lga.$sep.$ref_code.$sep.$coupon;
		$_SESSION['signup-1']=$data;

		header('Location: signup-2.php');
		exit();
	}
}

if(isset($_GET['page']) and !empty($_GET['page'])){
	$type=$_GET['page'];
	if($type=='aggregator'){
		$_SESSION['type']='aggregator';
	}else{
	$_SESSION['type']='merchant';	
	}
}else{
	$_SESSION['type']='merchant';
}

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
			<div class="s-line"></div>
			<div class="s-circle s-circle1" style="float: left;">
				<div class="s-inner-c">
					<div class="s-inner-c-pad">1</div>
				</div>
			</div>

			<center><div class="s-circle">
				<div class="s-inner-c s-i-grey">
					<div class="s-inner-c-pad">2</div>
				</div>
			</div>

			<div class="s-circle" style="float: right">
				<div class="s-inner-c s-i-grey">
					<div class="s-inner-c-pad">3</div>
				</div></div>
			</center>

		</div>

		<div class="s-text-header">
			<div class="s-t-h s-t-h-active" style="width: 40%;">Information</div>
			<div class="s-t-h" style="width: 20%;">Details</div>
			<div class="s-t-h" style="width: 40%;">&nbsp;&nbsp; Finish</div>
		</div>

		<div class="clearfix"></div>
		<br>
			<?php if($errors!==array()){
				?><br>
				<div class="s-t-h s-t-h-active" style="width: 100%;clear: both;">
				<?php 
				foreach ($errors as $e) {
					echo $e.'<br>';
				}?>
				</div><br><br>
				<?php 
			} ?>

		<div class="s-form-pad">
			<form method="post" action="signup-1.php">
			<div class="s-left-form">
				<input type="text" placeholder="Business Name" <?php if(post('business_name')){echo 'value="'.post('business_name').'"';} ?> name="business_name" required>
			</div>
			<?php if ($_SESSION['type']=='merchant') {
				?>
			<div class="s-right-form">
				<input type="text" placeholder="Referral Code" name="ref_code" <?php if(post('ref_code')){echo 'value="'.post('ref_code').'"';} ?>>
			</div>
			<?php } ?>

			<div class="s-form-space"></div>

			<div class="s-left-form">
				<select id="state" name="state" required>
					<option>Select Your State</option>
				<?php foreach ($states as $b) {
					?>
				<option value="<?php echo $b;?>"><?php echo str_replace(' State', '', $b); ?></option>
					<?php
				} ?>
				</select>
				</select>
			</div>
			<div class="s-right-form">
				<select id="lga" name="lga" required>
					<option>Select Your Local Government Area</option>
				</select>
			</div>

		    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
		    <script type="text/javascript">

		    	var state=document.getElementById('state');
		        $(document).ready(function() {

				state.addEventListener('change', function(){
					console.log(state.value);


		                $.post('api/lga.php', { state: state.value },
		            function(result){
		                $('#lga').html(result).show();
		                });
		            });
		        });

		    </script>


			<div class="s-form-space"></div>

			<input type="text" name="business_address" placeholder="Business Address" <?php if(post('business_address')){echo 'value="'.post('business_address').'"';} ?> required>

			<div class="s-form-space"></div>

			<?php if ($_SESSION['type']=='merchant') {
				?>
			<div class="s-left-form">
			<input type="text" placeholder="Coupon Code" name="coupon" <?php if(post('coupon')){echo 'value="'.post('coupon').'"';} ?>>
			</div>
			<?php } ?>

			<div class="clearfix"></div>
		</div>	
		<label for="sub1" class="s-submit">Next</label>
		<input type="submit" id="sub1" style="display: none;">	
		</form>

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