<?php
require_once('core/Autoloader.php');
$autoloader = Autoloader::getInstance();
$autoloader->addClassPath('core/Component.php');
$autoloader->addClassPath('core/Application.php');


$config      = array(
	'components' => array(
		'controllerFilter' => array(
			'class' => 'components/Session.php',
			'name'  => 'SomeSessionName'
		),
	),
	'preloadComponentNames' => array(
		'controllerFilter'
	),
);
$config      = array();
$application = new Application($config);
$application->run();

require_once('controllers/InfoController.php');
 if(in_array('actionIndex',(InfoController::CALLBACK_ON['actions']))
	and !eval('return '. Application::getInstance()->controllerFilter->check().';') ) {
	 echo "do Nothing";
 }
