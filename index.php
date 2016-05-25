<?php
require_once('core/Autoloader.php');
$autoloader = Autoloader::getInstance();
$autoloader->addClassPath('core/Component.php');
$autoloader->addClassPath('core/Application.php');


/*$config      = array(
	'components' => array(
		'session' => array(
			'class' => 'components/Session.php',
			'name'  => 'SomeSessionName'
		),
	),
);*/
$config      = array();
$application = new Application($config);
$application->run();

