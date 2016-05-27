<?php
require_once('core/Autoloader.php');
$autoloader = Autoloader::getInstance();
$autoloader->addClassPath('core/Component.php');
$autoloader->addClassPath('core/Application.php');

$config      = array(
	'components'            => array(
		'controllerFilter' => array(
			'class' => 'components/ControllerFilter.php',
		),
		'db' => array(
			'class' => 'components/Database.php',
			'dataSourceName'  => 'mysql:host=localhost;dbname=task2db',
			'user'  => 'root',
			'password'  => 'root',
		),
		'active_record' => array(
			'class' => 'active_record/ActiveRecord.php',
		),
	),
	'preloadComponentNames' => array(
		'controllerFilter','active_record'
	),
);

$application = new Application($config);
$application->run();