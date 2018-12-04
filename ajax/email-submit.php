<?php

include_once("../config/Config.php");

$email_access = new Config();

if(isset($_POST['email_data_values'])){

	$n_email = $_POST['email_data_values'];
	$email = $email_access->htmlfilter($n_email);

	if(preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)){

		$email_field['email'] = $email;
		$email_check = $email_access->email_exits("email",$email_field);

		if($email_check){

			$insert = $email_access->insert("email",$email_field);
			if($insert){
				echo "Thank You For Subscribe";
			}
			else{
				echo "Not Subscribed";
				return false;
			}

		}
		else{
			echo "You Have Already Subscribed";
			return false;
		}

	}
	else{
		if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)){
			echo "Please Enter a Valid Email";
			return false;
		}
	}

}


?>