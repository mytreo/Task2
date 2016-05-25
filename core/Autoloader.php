<?php

class Autoloader {
    protected static $_selfInstance = null;
    
    protected $_classPaths = array();
    
    public static function getInstance() {
        if (!is_object(self::$_selfInstance)) {
            self::$_selfInstance = new Autoloader();
        }
        return self::$_selfInstance;
    }
    
    protected function __construct() {
        $corePaths = array(
            'Component' => 'core/Component.php',            
        );
        $this->setClassPaths($corePaths);
        $this->register();
    }
    
    // Class Paths
    public function setClassPaths(array $classPaths) {
        $this->clearClassPaths();
        return $this->mergeClassPaths($classPaths);
    }
    
    public function getClassPaths() {
        return $this->_classPaths;
    }
    
    public function addClassPath($classPath) {
        $realClassPath = realpath($classPath);
        $className = basename($realClassPath, '.php');
        if (empty($className)) {
            throw new Exception("Path '{$classPath}' is not a valid path to the class file!");
        }
        $this->_classPaths[$className] = $realClassPath;
        return $className;
    }
    
    public function mergeClassPaths(array $classPaths) {
        $classNames = array();
        foreach($classPaths as $classPath) {
            $classNames[] = $this->addClassPath($classPath);
        }
        return $classNames;
    }
    
    public function clearClassPaths() {
        $this->_classPaths = array();
        return true;
    }
    
    // Main:
    public function register() {
        $callback = array(
            $this,
            'autoload'
        );
        return spl_autoload_register($callback);
    }
    
    public function autoload($className) {
        if (array_key_exists($className, $this->_classPaths)) {
            require_once($this->_classPaths[$className]);
            return true;
        }
        return false;        
    }
}