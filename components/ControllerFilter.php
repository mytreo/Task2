<?php
class ControllerFilter{
	public function check(){
		$someValue='some';
		return (!is_null($_GET['checkValue']))? $_GET['checkValue']== $someValue: false ;
	}
}