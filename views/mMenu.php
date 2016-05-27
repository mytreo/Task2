<ul class ="menu">
	<li><a href= <?php echo Application::getInstance()->urlManager->getAddress();  ?> >«домашняя страница»</a></li>
	<li><a href=<?php  echo Application::getInstance()->urlManager->getAddress('help/about');  ?>>«справка/о программе»</a></li>
	<li><a href=<?php echo Application::getInstance()->urlManager->getAddress('help/manual');  ?>>«справка/инструкция»</a></li>
	<li><a href=<?php echo Application::getInstance()->urlManager->getAddress('info/company');  ?>  >«информация/о компании»</a></li>
	<li><a href=<?php echo Application::getInstance()->urlManager->getAddress('info/company').'&checkValue=some'; ?>>I2</a></li>
	<li><a href=<?php echo Application::getInstance()->urlManager->getAddress('info/terms');  ?>>«информация/условия использования»</a></li>
	<li><a href=<?php echo Application::getInstance()->urlManager->getAddress('items/ShowItems'); ?>>«Товары»</a></li>
</ul>
