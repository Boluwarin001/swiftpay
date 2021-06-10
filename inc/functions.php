<?php 


function post($v){
	if (isset($_POST[$v]) and !empty($_POST[$v])) {
		return $_POST[$v];
	}else{
		return false;
	}
}

function post_to_null($v){
	if(isset($_POST[$v]) and !empty($_POST[$v])){
		return $_POST[$v];
	}else{
		return null;
	}
}

function san($v){
	global $con;
	$r=str_replace('<>', ' ', $v);
	$r=mysqli_real_escape_string($con, $r);
	return $r;
}

function aesencrypt($text){

$plaintext=$text;
$method = 'aes-256-cbc';

$key='H/oA30bOFAY3Jx9oOQ2lxQ==';

// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));

return $encrypted;

}

function aesdecrypt($text){

$encrypted=$text;
$method = 'aes-256-cbc';

$key='H/oA30bOFAY3Jx9oOQ2lxQ==';

// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// My secret message 1234
$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);


return $decrypted;

}
 ?>