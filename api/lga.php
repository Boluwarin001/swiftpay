<?php 


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

$d=file_get_contents('lga');

$v=json_decode($d);

echo '<pre>';



if(isset($_POST['state']) and !empty($_POST['state'])){
	foreach ($v as $key) {
		$state=$_POST['state'];
		if (in_array($state, $states)) {
			$stateGet=$key->state->name;
			$lgaGet=$key->state->locals;

			if($stateGet==$state){
				foreach ($lgaGet as $lga) {
					echo '<option value="'.$lga->name.'">'.$lga->name.'</option>';
				}
			}

		}
	}

}
 ?>