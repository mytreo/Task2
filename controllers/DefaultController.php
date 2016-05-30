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
               </script>
               <input id='goto1' type='button' value='goTo Товары JS' onclick='goTo(this);'>
               <input id='goto2' type='button' value='goTo Запросы JS' onclick='goTo(this);'>
               
               <script>              
                function sum(){
               		   this.v1_val= document.getElementById('v1').value;
               		   this.v2_val= document.getElementById('v2').value;
               		   this.r1= document.getElementById('r1');
               		   
               		   this.r1.value= parseInt(v1_val)+parseInt(v2_val);
               		   return true;
               		}
               </script>              
               <div class='calc-1'>
               <input id='v1' type='number' value='0' onchange='sum();'> +
               <input id='v2' type='number' value='0'onchange='sum();'> =
               <input id='r1' type='number' readonly>
               </div>
               
               
               <script>
               function Calc(){
					    this.v1 = document.getElementById('v21');
					    this.v2 = document.getElementById('v22');
					    this.r = document.getElementById('r21');
					    this.span = document.getElementById('oper');

					    this.sum = function(operaion){
					            this.v1_val = parseFloat(this.v1.value);
					    		this.v2_val = parseFloat(this.v2.value);			   
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
                
               <script>
               		function goToJQ(obj){              	    
               		 if($(obj).attr('id') == 'goto41'){              		    
               		  	url ='". Application::getInstance()->urlManager->getAddress('items/ShowItems')."';}
               		 else {
               		    url ='". Application::getInstance()->urlManager->getAddress('query/list')."';}              	               		    	   
               		   $(location).attr('href',url); 
               		 }
               </script>
               <input id='goto41' type='button' value='goTo Товары JS' onclick='goToJQ(this);'>
               <input id='goto42' type='button' value='goTo Запросы JS' onclick='goToJQ(this);'>
               
               <script>              
               	  (function($) {
		            $.fn.sumJQ = function() {
		                $(this).change(function() {			                	 
							$('#r41').attr('value',  parseFloat($('#v41').attr('value')) + parseFloat($('#v42').attr('value')));
		                });
		                return this;
		            }
		          })(jQuery)	
		                    
               	 $(document).ready(function(){
		            $('#v41,#v42').sumJQ();
		        })	
               </script>              
               <div class='calc-1'>
               <input id='v41' type='number' value='0' '> +
               <input id='v42' type='number' value='0' '> =
               <input id='r41' type='number' readonly>
               </div>  
                
               <script>
               function Calc2(){
					    this.v1 =$('#v51');
					    this.v2 =$('#v52');
					    this.r = $('#r51');
					    this.span = $('#oper5');

					    this.sum = function(operaion){ 
						    this.v1_val = parseFloat(this.v1.attr('value')); 
						    this.v2_val = parseFloat(this.v2.attr('value')); 
							    switch (operaion) {
							        case '+':{
							            this.r.attr('value',this.v1_val + this.v2_val);
							            this.span.html('+');
							            break;}
							        case '-':{
							            this.r.attr('value', this.v1_val - this.v2_val);
							            this.span.html('-');
							            break;}
							        case '*':{
							            this.r.attr('value', this.v1_val * this.v2_val);
							            this.span.html('*');
							            break;}
							        case '/':{
							            this.r.attr('value', this.v1_val / this.v2_val);
							            this.span.html('/');
							            break;}
							    }
					   }
					   return true;
					} 
               </script>
               <div class='calc-2'>
               <input id='v51' type='number' value='2' onchange='sum();'> <span id='oper5'></span>
               <input id='v52' type='number' value='3'onchange='sum();'> =
               <input id='r51' type='number' readonly>
                <input id='b1' type='button' value='+'>
                <input id='b2' type='button' value='-' >
                <input id='b3' type='button' value='*' >
                <input id='b4' type='button' value='/' >
               </div>
               <script>
               	var calc2 = new Calc2(); 
               	 $(document).ready(function(){
	                 $('#b1, #b2, #b3, #b4').click(function(event){
			                 calc2.sum($(this).attr('value'));
			                 return false;
			            });
               	 });
               </script>    
               
               
               <div id=\"modal_form\"><!-- Сaмo oкнo --> 
				   <span id=\"modal_close\">X</span> <!-- Кнoпкa зaкрыть --> 
				   <h1 id='title3'></h1>
				   <p id='text3'> </p>
			   </div>
			   <div id=\"overlay\"></div><!-- Пoдлoжкa -->
               
               <div class='message-2'>
               <input id='title2' value='header'> 
               <input id='text2' value='inner text'> 
               <label id='btn8' class='btn' >Dialog Window</label>
               </div>   
               <script>
                $(document).ready(function() { 
                    function DialogManager2(){
                      this.title = $('#title2');
                      this.text = $('#text2');
                      this.title_el = $('#title3');
                      this.text_el = $('#text3');
                     }
                     var dm2= new DialogManager2();               	                                     
					$('#btn8').click({title: \"Hello\", text: \"World\"}, cool_function);
					 
					 function cool_function(ev){
					    dm2.title_el.html( ev.data.title ?  ev.data.title: dm2.title.attr('value'));
               	        dm2.text_el.html( ev.data.text ?  ev.data.text: dm2.text.attr('value'));					 
						$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
						    function(){ // пoсле выпoлнения предъидущей aнимaции
								$('#modal_form') 
									.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
									.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
							});
					}
					/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
					$('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
						$('#modal_form')
							.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
								function(){ // пoсле aнимaции
									$(this).css('display', 'none'); // делaем ему display: none;
									$('#overlay').fadeOut(400); // скрывaем пoдлoжку
								}
							);
					});
				});
               </script>
               <div id=\"dialog\" title=\"Basic dialog\">
				  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
				</div>
              <script>
			  $(function() {
			    $( \"#dialog\" ).dialog();
			  });
			  </script>
               
";
	}
}