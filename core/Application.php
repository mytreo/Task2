<?php
class Application extends Component{
	protected static $_selfInstance = null;
	protected $instanceNumber;
	protected $_components = array();
	protected $_preloadComponentNames = array(); // Store components to be preloaded

	public static function getInstance() {
		return self::$_selfInstance;
	}
	
	public function getInstanceNumber() {
		return $this->instanceNumber;
	}

	public static function get($componentName=null) {
		$application = self::getInstance();
		if (empty($componentName)) {
			return $application;
		}
		return $application->__get($componentName);
	}

	public function __construct(array $config=array()) {
		if (is_object(self::$_selfInstance)) {
			throw new Exception('Application instance has been already created!');
		}
		self::$_selfInstance = $this;
		$this->instanceNumber = rand(0,100);

		// Init default components:
		$defaultComponents = array(
			'urlManager' => array(
				'class' => 'components/UrlManager.php',
			),
			'router' => array(
				'class' => 'components/Router.php',
				'defaultControllerName' => 'test'
			),
			'session' => array(
				'class' => 'components/Session.php',
				'name' => 'SomeSessionName'
			),
			'controllerFilter' => array(
				'class' => 'components/ControllerFilter.php'
			),
		);
		$this->setComponents($defaultComponents);

		#$preloadComponentNames = array(
		#	'session'
		#);
		#$this->setPreloadComponentNames($preloadComponentNames);
		
		
		$this->applyConfig($config);
		// Preloading components:
		$this->preloadComponents();
	}

	public function __get($propertyName) {
		try {
			return parent::__get($propertyName);
		} catch(Exception $exception) {
			if ($this->hasComponent($propertyName)) {
				return $this->getComponent($propertyName);
			} else {
				throw $exception;
			}
		}
	}

	// Set up components:
	public function setComponents(array $components) {
		foreach($components as $name => $component) {
			$this->addComponent($name, $component);
		}
		return true;
	}

	public function getComponents() {
		return $this->_components;
	}

	public function addComponent($componentName, $componentObjectOrConfig) {
		if (is_scalar($componentObjectOrConfig)) return false;
		$this->_components[$componentName] = $componentObjectOrConfig;
		return true;
	}

	public function getComponent($componentName) {
		$componentOrConfig = $this->_components[$componentName];
		if (!is_object($componentOrConfig)) {
			$component = $this->createComponent($componentOrConfig);
		} else {
			$component = $componentOrConfig;
		}
		return $component;
	}

	public function hasComponent($componentName) {
		return array_key_exists($componentName, $this->_components);
	}

	public function createComponent(array $componentConfig) {
		$className = $componentConfig['class'];
		if (empty($className)) {
			throw new Exception('Component config should contain parameter "class"!');
		}
		unset($componentConfig['class']);
		if (!class_exists($className)) {
			$className = Autoloader::getInstance()->addClassPath($className);
		}
		$component = new $className($componentConfig);
		return $component;
	}

	// Preload components
	public function setPreloadComponentNames(array $preloadComponentNames) {
		$this->_preloadComponentNames = $preloadComponentNames;
		return true;
	}

	public function getPreloadComponentNames() {
		return $this->_preloadComponentNames;
	}

	protected function preloadComponents() {
		foreach($this->_preloadComponentNames as $componentName) {
			$component = $this->__get($componentName);
			if (!is_object($component)) {
				throw new Exception("Unable to preload component '{$componentName}'!");
			}
		}
		return true;
	}


	// Running the application:
	public function run() {
		echo('Application is running...<br />');
		$this->router->route();
	}

}