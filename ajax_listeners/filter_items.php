<?php
$items=Application::getInstance()->db->queryObject('StdClass',
	'SELECT i.id, c.name cat, i.name,i.price, i.description
       FROM item i 
      inner join category c on c.id=i.category_id 
      where i.id=:id or :id=-1',array(':id'=>$id_value));

echo "<td> {$items[0]->id}</td>";
?>