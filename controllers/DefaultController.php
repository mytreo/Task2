<?php
require_once('controllers/BaseControllerFunctional.php');
class DefaultController extends BaseControllerFunctional
{
	public static function actionIndex($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'default/index',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'домашняя страница')
			),
			'content' => array(
				'data' => '<p>Main Content</p>'
			)
		);
		self::render($config);
	}

	public static function actionContact($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'default/contact',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'test Contact')
			),
			'content' => array(
				'data' => '<p>contact Content</p>'
			)
		);
		self::render($config);
	}
}