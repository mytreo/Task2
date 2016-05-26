<?php
class UrlManager extends Component {
	public function getDomain() {
		#echo "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'],0,stripos ( $_SERVER['REQUEST_URI'], '.php')+4)."<br/>";
		return "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'],0,stripos ( $_SERVER['REQUEST_URI'], '.php')+4);
	}

	public function getAddress($requestedPage=null){
		echo $this->getDomain() . (!is_null($requestedPage)?"?r=".$requestedPage:null);
		return $this->getDomain() . (!is_null($requestedPage)?"?r=".$requestedPage:null);
	}
}