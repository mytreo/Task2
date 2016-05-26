<?php
class DefaultController {
	public static function actionIndex($params=null){

		require_once('core/View.php');
		$view = new View();

		$data = array('header' => 'домашняя страница');
		$bodyHeader = $view->render('head', $data, true);
		$bodyMenu = $view->render('mMenu', null, true);
		$bodyContent = $view->render('contMain', null, true);
		$data = array('copyright' => 'mytreo',
		              'route' => 'default/index');
		$bodyFooter = $view->render('footer', $data, true);

		$data = array(
			'header' => $bodyHeader,
			'mMenu' => $bodyMenu,
			'content' => $bodyContent,
			'footer' => $bodyFooter
		);
		$view->render('defaultLayout', $data);

	}

    public static function actionContact($params=null){
	    echo "<br>";
	    echo "routed to -> default/contact <br>";
	    echo 'params in controller method='.$params;
    }
}