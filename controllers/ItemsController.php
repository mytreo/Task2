<?php
require_once('controllers/BaseControllerFunctional.php');
class ItemsController extends BaseControllerFunctional
{

	public static function actionShowItems($params = null)
	{
		$items=Application::getInstance()->db->queryObject('StdClass','SELECT i.id, c.name cat, i.name,i.price, i.description FROM item i inner join category c on c.id=i.category_id ');
		
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'items/showItems',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'список товаров')
			),
			'content' => array(
				'name' => 'contentItems',
				'data' =>  array('items' => $items)
			)
		);
		self::render($config);
	}

}