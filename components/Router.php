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
       if (array_key_exists('r', $_GET))
        {
        $wayArray    = explode('/', $_GET["r"], 3);
        $wayArray[0] = ($wayArray[0] == null) ? 'default' : $wayArray[0]; //controller
        $wayArray[1]; //method
        try {
            $controllerClassName = 'controllers/' . $wayArray[0] . 'Controller' . '.php';
            if (!class_exists($controllerClassName)) {
                $controllerClassName = Autoloader::getInstance()->addClassPath($controllerClassName);
            }

            $routeName   = 'action'.$wayArray[1];
            $routeParams = (!array_key_exists(2, $wayArray)) ? '' : $wayArray[2];
            if (method_exists($controllerClassName, $routeName)) {
                return call_user_func(array($controllerClassName, $routeName), $routeParams);
            } else {
                #throw new RoutingException("No Way in '" . get_class($controllerClassName) . "/{$routeName}'!");
                return call_user_func(array('DefaultController', 'actionindex'), '');
            }

        } catch (RoutingException $ex) {
            echo $ex->getMessage().' Redirect to Home';
           # return call_user_func(array('DefaultController', 'actionindex'), '');
            /* Redirect browser */
            ##header("Location: http://localhost:63342/Task1/index.php");
            #header("Location: http://". $_SERVER["HTTP_HOST"]."/Task1/index.php");
           # exit();
        }
    }

    }
    
    public function setDefaultControllerName($controllerName) {
        $this->_defaultControllerName = $controllerName;
        return true;
    }
    
    public function getDefaultControllerName() {
        return $this->_defaultControllerName;
    }
}