<?php 

class Config{

	private $DBHOST = 'localhost';
	private $DBUSER = 'root';
	private $DBPASS = '';
	private $DBNAME = 'newsletter';
	public $con;

	public function __construct(){
		$this->con = mysqli_connect($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME);
		if(!$this->con){
			return false;
		}
	}

	public function htmlfilter($form_data){
		$form_data = trim(stripcslashes(htmlspecialchars($form_data)));
		return $form_data;
	}


	public function insert($tblname,$field_data){

		$field_var = "";
		foreach($field_data as $f_key => $f_value){
			$field_var = $field_var."$f_key='$f_value',";
		}
		$field_var = rtrim($field_var,",");

		$insert = "INSERT INTO $tblname SET $field_var";
		$insert_fire = mysqli_query($this->con, $insert);
		if($insert_fire){
			return $insert_fire;
		}
		else{
			return false;
		}

	}

	public function email_exits($tblname, $condition, $op='AND'){

		$field_var = "";
		foreach($condition as $f_key => $f_value){
			$field_var = $field_var."$f_key='$f_value'$op";
		}
		$field_var = rtrim($field_var,"$op");

		$email = "SELECT * FROM $tblname WHERE $field_var";
		$email_fire = mysqli_query($this->con, $email);
		if(mysqli_num_rows($email_fire) > 0){
			return false;
		}
		else{
			return true;
		}

	}


}

?>