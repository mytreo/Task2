<?php
require_once('controllers/BaseControllerFunctional.php');
class DefaultController extends BaseControllerFunctional
{
	public static function actionIndex($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'default/index',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'домашняя страница')
			),
			'content' => array(
				'data' => self::getHtmlForMain()
			)
		);
		self::render($config);
	}

	public static function actionContact($params = null)
	{
		$config = array(
			'footer'  => array(
				'data' => array(
					'copyright' => 'mytreo',
					'route'     => 'default/contact',
				)
			),
			'head'    => array(
				'data' => array(
					'header' => 'test Contact')
			),
			'content' => array(
				'data' => '<p>contact Content</p>'
			)
		);
		self::render($config);
	}

	protected static function getHtmlForMain(){
		return "<p>Main Content</p>
               <script>
               		function goTo(obj){
               		 if(obj.getAttribute('id') == 'goto1'){
               		  	window.location ='". Application::getInstance()->urlManager->getAddress('items/ShowItems')."';}
               		 else {
               		     window.location ='". Application::getInstance()->urlManager->getAddress('query/list')."';}
               		 }
               		 
                     function sum(){
               		   this.v1_val= document.getElementById('v1').value;
               		   this.v2_val= document.getElementById('v2').value;
               		   this.r1= document.getElementById('r1');
               		   
               		   this.r1.value= parseInt(v1_val)+parseInt(v2_val);
               		   return true;
               		}
               		             		
               		 function Calc(){
					    this.v1_val = parseFloat(document.getElementById('v21').value);
					    this.v2_val = parseFloat(document.getElementById('v22').value);
					    this.r = document.getElementById('r21');
					    this.span = document.getElementById('oper');

					    this.sum = function(operaion){
					    					   
							    switch (operaion) {
							        case '+':{
							            this.r.value = this.v1_val + this.v2_val;
							            this.span.innerHTML= '+';
							            break;}
							        case '-':{
							            this.r.value = this.v1_val - this.v2_val;
							            this.span.innerHTML = '-';
							            break;}
							        case '*':{
							            this.r.value = this.v1_val * this.v2_val;
							            this.span.innerHTML = '*';
							            break;}
							        case '/':{
							            this.r.value = this.v1_val / this.v2_val;
							            this.span.innerHTML = '/';
							            break;}
							    }
					   }
					   return true;
					} 
              	
              		
               </script>
               <input id='goto1' type='button' value='goTo Товары JS' onclick='goTo(this);'>
               <input id='goto2' type='button' value='goTo Запросы JS' onclick='goTo(this);'>
               <div class='calc-1'>
               <input id='v1' type='number' value='0' onchange='sum();'> +
               <input id='v2' type='number' value='0'onchange='sum();'> =
               <input id='r1' type='number' readonly>
               </div>
               
               <div class='calc-2'>
               <input id='v21' type='number' value='0' onchange='sum();'> <span id='oper'></span>
               <input id='v22' type='number' value='0'onchange='sum();'> =
               <input id='r21' type='number' readonly>
                <input type='button' value=' + ' onclick='return calc.sum(\"+\");'>
                <input type='button' value=' - ' onclick='return calc.sum(\"-\");'>
                <input type='button' value=' * ' onclick='return calc.sum(\"*\");'>
                <input type='button' value=' / ' onclick='return calc.sum(\"/\");'>
               </div>
               <script>
               	var calc = new Calc(); 
               </script>    
                                        
				<div class=\"modal\">
				  <input class=\"modal-open\" id=\"modal-1\" type=\"checkbox\" hidden>
				  <div class=\"modal-wrap\" aria-hidden=\"true\" role=\"dialog\">
				    <label class=\"modal-overlay\" for=\"modal-1\"></label>
				    <div class=\"modal-dialog\">
				      <div class=\"modal-header\">
				        <h2 id='modal-header'>Заголовок </h2>
				        <label class=\"btn-close\" for=\"modal-1\" aria-hidden=\"true\">×</label>
				      </div>
				      <div class=\"modal-body\">
				        <p id='modal-text'>содержание...</p>
				      </div>
				    </div>
				  </div>
				</div>
               
               <div class='message-1'>
               <input id='title1' value='header'> 
               <input id='text1' value='inner text'> 
               <label class=\"btn\"  onclick='d.dialogShow(\"one\",\"two\");'>Dialog Window</label>
               </div>   
               <script>
                function DialogManager(){
                 this.title_str= document.getElementById('title1').value;
                 this.text_str= document.getElementById('text1').value;
                 this.title_el= document.getElementById('modal-header');
                 this.text_el= document.getElementById('modal-text');
               	 this.dialogShow = function(title,text){
               	     this.title_el.innerHTML = title ? title : this.title_str;
               	     this.text_el.innerHTML = text ? text : this.text_str;
               	     document.getElementById('modal-1').checked=true;
               	 }
               	}
               	
               	var d = new DialogManager()
               </script>    
";
	}
}