<?php



class Sanjay{


	public function hashPass($name){
	$this->name=$name;
	$pass=md5($this->name);
	$pass=hash('sha256',$pass);
	$pass='openplus'.$pass;

	return $pass;
	}	
	




}

$sanjay=new Sanjay();
?>
