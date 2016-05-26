<ul class ="menu">
	<li><a href= <?php Application::getInstance()->urlManager->getAddress();  ?> >«домашняя страница»</a></li>
	<li><a href=<?php Application::getInstance()->urlManager->getAddress('help/about');  ?> >«справка/о программе»</a></li>
	<li><a href=<?php Application::getInstance()->urlManager->getAddress('help/manual');  ?>  >«справка/инструкция»</a></li>
	<li><a href=<?php Application::getInstance()->urlManager->getAddress('info/company');  ?>  >«информация/о компании»</a></li>
	<li><a href=<?php Application::getInstance()->urlManager->getAddress('info/terms');  ?>  >«информация/условия использования»</a></li>
</ul>
