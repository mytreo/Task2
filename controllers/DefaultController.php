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
				'name' => 'contMain',
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
				'name' => 'contMain',
			)
		);
		self::render($config);
	}
}