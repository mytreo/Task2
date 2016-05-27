<?php

class Component {
    public function __get($propertyName) {
        $methodName = 'get'.$propertyName;
        if (method_exists($this, $methodName)) {
            return call_user_func( array($this, $methodName) );
        } else {
            throw new Exception("Missing property '".get_class($this)."::{$propertyName}'!");
        }
    }
    
    public function __set($propertyName, $value) {
        $methodName = 'set'.$propertyName;
        if (method_exists($this, $methodName)) {
            return call_user_func( array($this, $methodName), $value );
        } else {
            throw new Exception("Missing property '".get_class($this)."::{$propertyName}'!");
        }
    }
    
    public function __call($methodName,$parameters) {
        throw new Exception("Missing method '".get_class($this).'::'."{$methodName}'!");
    }

    public function __construct($componentConfig=array())
    {
        $this->applyConfig($componentConfig);
    }

    // Config: 
    public function applyConfig(array $config) {
        foreach($config as $name=>$value) {
            if (!is_object($this->$name)) {
                $this->$name = $value;
            } else {
                $this->$name->applyConfig($value);
            }
        }
        return true;
    }
}