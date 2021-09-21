<?php 
if (isset($datapage['table_analytic'])) {
	for ($i=0; $i < count($datapage['table_analytic']); $i++) { 
		?>
		<div class="col-sm-3 infobox-container">
			<div class="infobox infobox-green">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-tags"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number <?=$datapage['table_analytic'][$i]?>-nbr">0</span>
					<div class="infobox-content infobox-<?=$datapage['table_analytic'][$i]?>">Table name</div>
				</div>

				<div class="stat stat-success increase-<?=$datapage['table_analytic'][$i]?>">0%</div>
			</div>
		</div>
	<?php
	}
}
?>