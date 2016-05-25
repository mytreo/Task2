<?php

class View extends Component {
	protected $_viewPath = 'views';

	// Set / Get :
	public function setViewPath($path) {
		if (!is_string($path)) {
			return false;
		}
		$this->_viewPath = $path;
		return true;
	}

	public function getViewPath() {
		return $this->_viewPath;
	}

	// Service:
	public function resolveViewFile($viewName) {
		$viewFileName = $this->_viewPath.'/'.$viewName.'.php';
		return $viewFileName;
	}

	// Render allowing to fetch result:
	protected function renderInternal($_viewFile_, $_data_=null, $_return_=false) {
		if (is_array($_data_)) {
			extract($_data_,EXTR_PREFIX_SAME,'data');
		} else {
			$data = $_data_;
		}
		if($_return_) {
			ob_start();
			ob_implicit_flush(false);
			require($_viewFile_);
			return ob_get_clean();
		} else {
			require($_viewFile_);
		}
	}

	public function renderFile($viewFile, $data=null, $return=false) {
		return $this->renderInternal($viewFile, $data, $return);
	}

	public function render($viewName, $data=null, $return=false) {
		$viewFile = $this->resolveViewFile($viewName);
		return $this->renderFile($viewFile, $data, $return);
	}
}