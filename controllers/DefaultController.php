<?php
class DefaultController {
	public static function actionIndex($params=null){
		echo "<br>";
		echo "routed to -> default/index <br>";
		echo 'params in controller method='.$params;

		echo  "<a href='index.php' >«домашняя страница»</a><br/>".
			  "<a href='index.php?r=help/about' >«справка/о программе»</a><br/>".
			  "<a href='index.php?r=help/manual'  >«справка/инструкция»</a><br/>".
			  "<a href='index.php?r=info/company'  >«информация/о компании»</a><br/>".
			  "<a href='index.php?r=info/terms'  >«информация/условия использования»</a><br/>";

	}

    public static function actionContact($params=null){
	    echo "<br>";
	    echo "routed to -> default/contact <br>";
	    echo 'params in controller method='.$params;
    }
}