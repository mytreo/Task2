<?php

class Session extends Component {
	public function __construct() {
		echo 'Instance of "'.get_class($this).'" has been created!<br />';
	}

	public function getName() {
		return session_name();
	}

	public function setName($name) {
		return session_name($name);
	}
}