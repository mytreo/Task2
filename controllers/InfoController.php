<?php
require_once('controllers/BaseControllerFunctional.php');
class InfoController extends BaseControllerFunctional
{

	const CALLBACK_ON = array('actions'=>array('actionCompany'),'filters'=>array('controllerFilter', ));

	function __construct()
	{
		$filter = Application::getInstance()->controllerFilter;
		$this->addCallback('actionCompany', $filter::check());
		$this->addCallback('actionTerms', $filter::check());
    }


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
				'data' => '<p>company Content</p>'
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
				'data' => '<p>terms Content</p>'
			)
		);
		self::render($config);
	}
}