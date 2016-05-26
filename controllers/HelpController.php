<?php
require_once('controllers/BaseControllerFunctional.php');
class HelpController extends BaseControllerFunctional
{
	public static function actionAbout($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'help/about',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'справка/о программе')
			),
			'content' => array(
				'name' => 'contAbout',
			)
		);
		self::render($config);
	}

	public static function actionManual($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'help/manual',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'справка/инструкция')
			),
			'content' => array(
				'name' => 'contManual',
			)
		);
		self::render($config);
	}
}