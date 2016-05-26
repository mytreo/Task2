<?php
require_once('components/Filter.php');

class ControllerFilter implements Filter
{
	public static function check()
	{
		$someValue = 'some';
		if (array_key_exists('checkValue', $_GET)) {
			return strcmp($_GET['checkValue'], $someValue) == 0;
		} else {
			return false;
		}

	}
}