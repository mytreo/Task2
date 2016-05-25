<?php
class InfoController
{
	public static function actionCompany($params = null)
	{
		echo "<br>";
		echo "routed to -> info/company <br>";
		echo 'params in controller method=' . $params;
	}

	public static function actionTerms($params = null)
	{
		echo "<br>";
		echo "routed to -> info/terms <br>";
		echo 'params in controller method=' . $params;
	}
}