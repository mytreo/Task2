<?php

class Router extends Component
{
	protected $_defaultControllerName = 'index';

	public function route()
	{
		if (array_key_exists('r', $_GET)) {
			$wayArray    = explode('/', $_GET["r"], 3);
			$wayArray[0] = ($wayArray[0] == null) ? 'default' : $wayArray[0]; //controller
			$wayArray[1]; //method
			$routeParams = (!array_key_exists(2, $wayArray)) ? '' : $wayArray[2];
			return $this->go($wayArray[0], $wayArray[1], $routeParams);
		}
		return $this->go('default', 'index', '');
	}

	public function go($controllerName, $controllerAction, $controllerActionParams)
	{
		$controllerClassName = 'controllers/' . $controllerName . 'Controller' . '.php';
		try {
			if (!class_exists($controllerClassName)) {
				$controllerClassName = Autoloader::getInstance()->addClassPath($controllerClassName);
			}
			$controllerInstanse = new $controllerClassName();
			return call_user_func(array($controllerInstanse, $controllerAction), $controllerActionParams);
		} catch (Exception $ex) {
			 header("Location: ".Application::getInstance()->urlManager->getAddress());
			exit();
		}
	}

	public function setDefaultControllerName($controllerName)
	{
		$this->_defaultControllerName = $controllerName;
		return true;
	}

	public function getDefaultControllerName()
	{
		return $this->_defaultControllerName;
	}
}