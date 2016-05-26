<?php
require_once('controllers/BaseControllerFunctional.php');
class InfoController extends BaseControllerFunctional
{
	const CALLBACK_ON = array('actions'=>array('actionCompany'),'filters'=>array('controllerFilter'));

	public static function actionCompany($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'info/company',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'информация/о компании')
			),
			'content' => array(
				'name' => 'contCompany',
			)
		);
		self::render($config);
	}

	public static function actionTerms($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'info/terms',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'информация/условия использования')
			),
			'content' => array(
				'name' => 'contTerms',
			)
		);
		self::render($config);
	}
}