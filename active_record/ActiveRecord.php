<?php

class ActiveRecord extends Component
{
	public function sql($sql,$params)
	{
		$db = Application::getInstance()->db;
		return $db->queryObject(get_class($this),$sql ,$params);
	}

	public function findAll()
	{
		$db = Application::getInstance()->db;
		return $db->queryObject(get_class($this), "SELECT * FROM " . get_class($this));
	}

	public function findByPk($id)
	{
		$db = Application::getInstance()->db;
		return $db->queryObject(
			get_class($this),
			"SELECT * FROM " . get_class($this) . " where id = :id",
			array(':id' => $id)
		);
	}

	public function __call($name, $arguments)
	{
		$searchParam = strtolower(str_replace('findBy', '', $name));
		if (property_exists(get_Class($this), $searchParam)) {

			$db = Application::getInstance()->db;
			return $db->queryObject(
				get_class($this),
				"SELECT * FROM " . get_class($this) . " where {$searchParam} =  :searchValue",
				array(':searchValue' => $arguments[0])
			);
		}
		return false;
	}

	public function save()
	{
		$clazz = get_class($this);

		$keys=Array();
		$values=Array();
		foreach($this as $key => $value) {
			if(isset($value)){
			array_push($keys, $key);
			array_push($values, $value);}
		}

		$db = Application::getInstance()->db;
		$r=0;
		if(!isset($this->id)){
			//insert
			$keys_str = implode ( ', ', $keys );
			$values_str = implode ( ', ', $values );
			$r=$db->execute("INSERT INTO ".$clazz." ({$keys_str}) values ({$values_str});");
		}else{
			//update
			$sets='SET';
			foreach ($keys as $key){
				$sets = $sets." {$key} = '{$this->{$key}}',";
			}
			$sets = substr($sets, 0, -1);
			$sql="UPDATE  ".$clazz." {$sets} WHERE id = {$this->id};";
			$r=$db->execute($sql);
		}
        return $r;
	}


}
