<?php

class BaseControllerFunctional extends Component
{
	const CALLBACK_ON = array('actions' => array(), 'filters' => array());
	protected $callbacks = array();

	public function addCallback($action, $callback)
	{
		$this->callbacks[$action] = $callback;
	}

	public function getCallback($action)
	{
		return array_key_exists($action, $this->callbacks) ? $this->callbacks[$action] : true;
	}

	public function __call($name, $arguments)
	{

		if (method_exists(get_Class($this), 'action' . $name)) {

			if (in_array('action' . ucfirst($name), ($this::CALLBACK_ON['actions']))
				?
				eval('return Application::getInstance()->' . $this::CALLBACK_ON['filters'][0] . '->check();')
				: true
				and $this->getCallback('action' . ucfirst($name))
			) {
				call_user_func(array($this, 'action' . $name), $arguments);
			} else {
				echo "Filter no Passed";
			}

		} else {
			header("Location: " . Application::getInstance()->urlManager->getAddress());
			exit();
		}
	}

	public function render($config)
	{
		require_once('core/View.php');
		$view = new View();

		$defConfig = array(
			'layout'  => array(
				'name' => 'defaultLayout',
				'data' => null
			),
			'footer'  => array(
				'name' => 'footer',
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => null
				)
			),
			'head'    => array(
				'name' => 'head',
				'data' => null
			),
			'menu'    => array(
				'name' => 'mMenu',
				'data' => null
			),
			'content' => array(
				'name' => 'contMain',
				'data' => null
			)
		);

		foreach ($config as $key => $value) {
			foreach ($value as $par => $v) {
				$defConfig[$key][$par] = $v;
			}
		}

		$bodyHeader  = $view->render($defConfig['head']['name'], $defConfig['head']['data'], true);
		$bodyMenu    = $view->render($defConfig['menu']['name'], $defConfig['menu']['data'], true);
		$bodyContent = $view->render($defConfig['content']['name'], $defConfig['content']['data'], true);
		$bodyFooter  = $view->render($defConfig['footer']['name'], $defConfig['footer']['data'], true);

		$data = array(
			'header'  => $bodyHeader,
			'mMenu'   => $bodyMenu,
			'content' => $bodyContent,
			'footer'  => $bodyFooter
		);
		$view->render($defConfig['layout']['name'], $data);

	}
}