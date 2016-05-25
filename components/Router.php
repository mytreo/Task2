<?php
class RoutingException extends Exception{

}

class Router extends Component {
    protected $_defaultControllerName = 'index';

    public function __construct() {
        echo 'Instance of "'.get_class($this).'" has been created!<br />';
    }
    
    public function route()
    {
        $wayArray = explode('/', $_GET["r"], 3);
        $wayArray[0]=($wayArray[0]==null)?'default':$wayArray[0]; //controller
       echo $wayArray[1]; //method
        try {
            $controllerClassName = 'controllers/' . $wayArray[0] . 'Controller' . '.php';
            if (!class_exists($controllerClassName)) {
                $controllerClassName = Autoloader::getInstance()->addClassPath($controllerClassName);
            }

            $routeName   = $wayArray[1];
            $routeParams = (!array_key_exists(2,$wayArray))?'':$wayArray[2];
            if (!method_exists($controllerClassName, $routeName)) {
                throw new RoutingException("No Way in '" . get_class($controllerClassName) . "/{$routeName}'!");
            }

        }catch(RoutingException $ex){
            echo $ex->getMessage();
            $controllerClassName='DefaultController';
            $routeName='contact';
            $routeParams='';
        }
        return call_user_func(array($controllerClassName, $routeName), $routeParams);

    }
    
    public function setDefaultControllerName($controllerName) {
        $this->_defaultControllerName = $controllerName;
        return true;
    }
    
    public function getDefaultControllerName() {
        return $this->_defaultControllerName;
    }
}