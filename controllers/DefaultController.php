<?php
class DefaultController {
    public static function contact($params=null){
	    echo "<br>";
	    echo "routed to -> default/contact <br>";
	    echo 'params in controller method='.$params;
    }
}