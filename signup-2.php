<?php 

require_once("inc/conn.php"); 
require_once("inc/functions.php"); 

$page='signup-2';
include_once('header.php');

if(!isset($_SESSION['signup-1']) or empty($_SESSION['signup-1'])){
	header('Location: signup-1.php');
	exit();
}



  $banks=array(
  		'Access Bank', 'Diamond Bank',
		'Ecobank Nigeria', 'Fidelity Bank Nigeria',
		'First Bank of Nigeria',
		'First City Monument Bank', 'Guaranty Trust Bank',
		'Heritage Bank plc', 
		'Keystone Bank Limited', 
		'Skye Bank', 
		'Stanbic IBTC Bank Nigeria Limited',
		'Standard Chartered Bank',
		'Sterling Bank', 'Union Bank of Nigeria',
		'United Bank for Africa', 'Unity Bank plc', 'Wema Bank', 'Zenith Bank', 'Jaiz Bank',
		'AB MicroFinanceBank', 'CMFB'
  );



function validatePhone($v){
	$str="$v";
	$cn=strlen($str);
	if($cn>9){
		$fc=$str[0];
		$sc=$str[1];

		$stage1=0;
		if(is_numeric($str) and $fc!=='+'){
			if($fc==0 and $cn==11){

				if($sc>6 and $sc<10){
				$trimmed=substr($str, 1);
				return "+234".$trimmed;
				}else{return false;}

			}
			elseif ($fc>6 and $fc<10 and $cn==10) {
				return "+234".$str;
			}
			else{return false;}
		}
		elseif ($fc=='+' and $str[1]==2 and $str[2]==3 and $str[3]==4) {
			$trimmed=substr($str, 4);
			$cn2=strlen($trimmed);
			$fc=$trimmed[0];
			$sc=$trimmed[1];
			if(is_numeric($trimmed)){
				if ($fc==0 and $cn2==11 and $sc>6 and $sc<10) {
					$timmer=substr($trimmed, 1);
					return "+234".$timmer;
				}
				elseif($fc>6 and $fc<10 and $cn2==10){
					return $str;
				}
				else{return false;}
			}
		}else{return false;}
	}else{return false;}

}

function validateAccName($v){
	$len=strlen($v);
	$arr=array();
	$arr=explode(' ', $v);
	$cn=count($arr);

	if($len<3 or $len>20){
		return false;
	}
	elseif($cn<2 or $cn>3){
		return false;
	}else{
		return $v;
	}
}

function validateAccNo($v){
	$len=strlen($v);
	$fc=$v[0];
	if($len!==10){
		return false;
	}else{
		if($fc==0){
			$trimmed=substr($v, 1);
			if(is_numeric($trimmed)){
				return $v;
			}else{
				return false;
			}
		}elseif(is_numeric($v)){
				return $v;
		}else{
			return false;
		}
	}
}

function salt($v){
	$pass=$v;
	$salt="woc4ni7F5z8u";
    $hash = md5($pass); 
    $hash_md5 = md5($salt . $pass); 
    return $hash_md5;
}

function validateEmail($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateBank($b){
	global $banks;
	if(in_array($b, $banks)){
		return $b;
	}else{
		return false;
	}
}


// if(!$a=validatePhone("9096476717")){
// 	echo 'False';
// }else{
// 	echo $a;
// }

	$errors=array();

if (post('phone') and post('email') and post('bank') and post('acc_name') and post('acc_number') and post('password')) {

	$phone=post('phone');
	$email=san(post('email'));
	$bank=san(post('bank'));
	$acc_name=trim(san(post('acc_name')));
	$acc_number=post('acc_number');
	$password=post('password');

	$pass=1;

	// SAN EACH INPUT


	if(!validatePhone($phone)){$pass=0;$errors[]="Invalid Phone Number";}

	if(!validateEmail($email)){$pass=0;$errors[]="Invalid Email Address";}

	if(!validateBank($bank)){$pass=0;$errors[]="Invalid Bank Name";}

	if(!validateAccName($acc_name)){$pass=0;$errors[]="Error with Account Name";}

	if(!validateAccNo($acc_number)){$pass=0;$errors[]="Invalid Account Number";}

	if(strlen($password)<5){$pass=0;$errors[]='Password too short';}

	$password=salt($password);
	$acc_number=aesencrypt($acc_number);
	$phone=aesencrypt($phone);

	if($pass==1){

	// FORMAT SIGNUP-1 business name <> business address <> state <> lga <> ref code <> coupon
	// FORMAT SIGNUP-2 phone <> email <> bank <> acc_name <> acc_number <> password
	$sep="<>";	
	$data=$phone.$sep.$email.$sep.$bank.$sep.$acc_name.$sep.$acc_number.$sep.$password;
	$_SESSION['signup-2']=$data;

	header('Location: signup-3.php');
	exit();
	}
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
			<div class="s-line" style="background: linear-gradient(90deg, #ec5756, #ec5756, #ff8417, #ff8417, #dbdada, #dbdada, #dbdada, #dbdada);"></div>

			<div class="s-circle s-circle2" style="float: left;">
				<div class="s-inner-c" style="background: #ec5756;color: #fff">
					<div class="s-inner-c-pad">1</div>
				</div>
			</div>

			<center><div class="s-circle s-circle3">
				<div class="s-inner-c " style="margin-left: 0px">
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
			<div class="s-t-h" style="width: 40%;">Information</div>
			<div class="s-t-h s-t-h-active" style="width: 20%;">Details</div>
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
			<form method="post" action="signup-2.php">
			<div class="s-left-form">
				<input type="number" name="phone" placeholder="Phone Number" <?php if(post('phone')){echo 'value="'.post('phone').'"';} ?> required>
			</div>
			<div class="s-right-form">
				<input type="email" name="email" placeholder="eMail Address" <?php if(post('email')){echo 'value="'.post('email').'"';} ?> required>
			</div>

			<div class="s-form-space"></div>

			<div class="s-left-form">
				<select name="bank">
				<option>Select Bank</option>
				<?php foreach ($banks as $b) {
					?>
				<option value="<?php echo $b;?>"><?php echo $b; ?></option>
					<?php
				} ?>
				</select>
			</div>
			<div class="s-right-form">
				<input type="text" name="acc_name" placeholder="Account Name" <?php if(post('acc_name')){echo 'value="'.post('acc_name').'"';} ?> required>
			</div>

			<div class="s-form-space"></div>

			<div class="s-left-form">
				<input type="text" name="acc_number" placeholder="Account Number" <?php if(post('acc_number')){echo 'value="'.post('acc_number').'"';} ?> required>
			</div>
			<div class="s-right-form">
				<input type="password" name="password" min="4" placeholder="Create Password" required>
			</div>

			<div class="clearfix"></div>
		</div>	
		<label for="sub1" class="s-submit">Almost Done</label>
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