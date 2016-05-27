<?php
require_once('controllers/BaseControllerFunctional.php');
class QueryController extends BaseControllerFunctional
{

	public static function actionList($params = null)
	{
		$items=Application::getInstance()->db->queryObject('StdClass',self::getQuery());
		$dataTable=self::getResultTable($items);

		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'query/list',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'список запросов')
			),
			'content' => array(
				'name' => 'contentQuery',
				'data' =>  $dataTable
			)
		);
		self::render($config);
	}


	public static function getResultTable($resultObjects){
		$str='<table class="query">';
		$str =$str."<tr>";
		foreach($resultObjects[0] as $key => $value) {
			$str =$str."<td>{$key}</td> ";
		}
		$str =$str."</tr>";
		foreach($resultObjects as $item){
			$str =$str."<tr>";
			foreach($item as $key => $value) {
				$str =$str."<td>{$value}</td> ";
			}
			$str =$str."</tr>";
		}
		$str=$str.'</table>';
	return $str;
	}

	public static function getQuery(){
		$queries= array(
			"Select id,name,price,date_created,description,category_id from item where price >6;",
			"Select id,name,price,date_created,description,category_id from item where price <6;",
			"Select id,name,price,date_created,description,category_id from item where name like '%fdf%';",
			"Select id,name,price,date_created,description,category_id from item order by name asc;",
			"Select id,name,price,date_created,description,category_id from item order by name desc;",
			"Select i.id,i.name,i.price,i.date_created,i.description,i.category_id,c.name category_name from item i inner join category c on i.category_id=c.id;",
			"Select c.id,c.name category_name,  count(1) cnt_items from category c inner join item i on i.category_id = c.id  group by c.id,c.name;",
			"Select c.id,c.name category_name,  sum(i.price) sum_price_items from category c inner join item i on i.category_id = c.id  group by c.id,c.name;",
			"Select c.id,c.name category_name,  avg(i.price) avg_price_items from category c inner join item i on i.category_id = c.id  group by c.id,c.name;",
			"Select c.id,c.name category_name from category c inner join item i on i.category_id = c.id  group by c.id,c.name having  count(1)>2 ;"
		);
		$queryNumber= isset($_GET['q'])?$_GET['q']:0;
		return $queries[$queryNumber];
	}
}