<?php
class HelpController
{
	public static function actionAbout($params = null)
	{
		echo "<br>";
		echo "routed to -> help/about <br>";
		echo 'params in controller method=' . $params;
	}

	public static function actionManual($params = null)
	{
		echo "<br>";
		echo "routed to -> help/manual <br>";
		echo 'params in controller method=' . $params;
	}
}