<?php
require_once('controllers/BaseControllerFunctional.php');
class ItemsController extends BaseControllerFunctional
{

	public static function actionShowItems($params = null)
	{
		$items=Application::getInstance()->db->queryObject('StdClass','SELECT i.id, c.name cat, i.name,i.price, i.description FROM item i inner join category c on c.id=i.category_id ');
		$str="<table style='border: 1px solid black'>";
		foreach($items as $item){
			$str =$str."<tr  onmouseover=\"showDiv('description_".$item->id."');\" onmouseout=\"hideDiv('description_".$item->id."');\">
			<td>{$item->cat}</td> <td>{$item->name}
			<div id=\"description_".$item->id."\" style=\"position: absolute; 
			display: none; border: solid; margin: 5px; padding: 5px; opacity: 1.0; background: white;\">{$item->description}</div>
			</td> <td>{$item->price}</td> 
			</tr>";
		}
		$str=$str.'</table>
		 <script type="text/javascript">
	        function showDiv(divId) {
	           // var div = document.getElementById(divId);
	           // div.style.display = \'block\';
	            $(\'#\'+divId).css({display:\'block\'});
	        }
	
	        function hideDiv(divId) {
	            var div = document.getElementById(divId);
	            div.style.display = \'none\';
	        }
        </script>
		';
		$str = $str.' <script>
						  $(function() {
						    $( "#accordion" ).accordion();
						  });
                    </script><div id=accordion>';
		foreach($items as $item) {
			$str = $str . "<h3>{$item->name}</h3> <div>{$item->description}</div>";
		}
		$str = $str.'</div>';


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