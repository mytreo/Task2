<?php

class Router extends Component {
    protected $_defaultControllerName = 'index';
    
    public function __construct() {
        echo 'Instance of "'.get_class($this).'" has been created!<br />';
    }
    
    public function route() {
        echo 'Routing in progress...';
    }
    
    public function setDefaultControllerName($controllerName) {
        $this->_defaultControllerName = $controllerName;
        return true;
    }
    
    public function getDefaultControllerName() {
        return $this->_defaultControllerName;
    }
}