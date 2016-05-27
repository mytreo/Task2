<?php
require_once('controllers/BaseControllerFunctional.php');
class ItemsController extends BaseControllerFunctional
{

	public static function actionShowItems($params = null)
	{
		$items=Application::getInstance()->db->queryObject('StdClass','SELECT c.name cat, i.name,i.price, i.description FROM item i inner join category c on c.id=i.category_id ');
		$str='<table>';
		foreach($items as $item){
			$str =$str."<tr> <td>{$item->cat}</td> <td>{$item->name}</td> <td>{$item->price}</td> <td>{$item->description}</td></tr>";
		}
		$str=$str.'</table>';

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
				'data' =>  $str
			)
		);
		self::render($config);
	}

}