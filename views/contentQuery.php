<div class="content2">
<div class="content-container clearfix">
	<div class="sidebar">
	<p>Query</p>
		<ul>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=0';
				?>>Выбрать все наименования, у которых цена меньше чем заданное значение.(6)</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=1';
				?>>Выбрать все наименования, у которых цена больше чем заданное значение.(6)</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=2';
				?>>Выбрать все наименования, в имени которых содержится заданная строка.(fdf)</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=3';
				?>>Показать список наименований отсортированных по имени в алфавитном порядке</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=4';
				?>>Показать список наименований отсортированных по имени в порядке обратном алфавитному</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=5';
				?>>Показать список наименований с именами категорий, которым они принадлежат</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=6';
				?>>Показать список категорий с вычисленным для каждой записи значением количества наименований в этой категории.</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=7';
				?>>Показать список категорий с вычисленным для каждой записи значением суммарной цены всех наименований в этой категории.</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=8';
				?>>Показать список категорий с вычисленным для каждой записи значением средней цены по всем наименованиям в этой категории.</a></li>
			<li> <a href=<?php echo Application::getInstance()->urlManager->getAddress('query/list').'&q=9';?>>
					Показать список категорий, в которых содержится не менее 2-х наименований.</a></li>
        </ul>
	</div>
	<div class="q-content">
		<p>Result</p>
		<?php echo $data ?>
	</div>
</div>
</div>

