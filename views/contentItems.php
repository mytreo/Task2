<div class="content">
	
	<?php
	function getItemsTableContent($p_items){
	$str = "";
	foreach ($p_items as $item) {
		$str = $str . "<tr  onmouseover=\"showDiv('description_" . $item->id
			. "');\" onmouseout=\"hideDiv('description_" . $item->id . "');\">
			<td>{$item->cat}</td> <td>{$item->name}
			<div id=\"description_" . $item->id . "\" style=\"position: absolute; 
			display: none; border: solid; margin: 5px; padding: 5px; opacity: 1.0; background: white;\">{$item->description}</div>
			</td> <td>{$item->price}</td> 
			</tr>";
	}
	echo $str;
	}?>
	
	<table id='table-items' style='border: 1px solid black'>
		<?php	getItemsTableContent($items);	?>
	</table>
	
	
	<script type="text/javascript">
		function showDiv(divId) {
			// var div = document.getElementById(divId);
			// div.style.display = \'block\';
			$('#' + divId).css({display: 'block'});
		}

		function hideDiv(divId) {
			var div = document.getElementById(divId);
			div.style.display = 'none';
		}
	</script>

	<input id='filter-for-row' type='number' value="-1">
	<input class="btn" type="button" value="ajaxTest" onclick="ajaxTest();">
	<script>
		function ajaxTest() {
			var idValue = $('#filter-for-row').attr('value');

			jQuery.ajax({
				type: 'POST',
				dataType: 'html',
				url: 'ajax_listeners/filter_items.php',
				data: {id_value: idValue},
				success: function (data, textStatus, jqXHR) {
					$('#table-items').html(data);
				}
			});
		}
	</Script>

	<script>
		$(function () {
			$("#accordion").accordion();
		});
	</script>
	<div id=accordion>
		<?php
		$str='';
		foreach ($items as $item) {
			$str = $str. "<h3>{$item->name}</h3> <div>{$item->description}</div>";
		}
		echo $str;
		?>
	</div>

</div>