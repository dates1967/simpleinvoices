<?php


	$patch['gene']['1']['name'] = "Add unit_cost to invoice items table";
	$patch['gene']['1']['patch'] = "ALTER TABLE ".TB_PREFIX."invoice_items ADD unit_cost DECIMAL( 25, 6 ) NULL AFTER total;";
    if ($db_server == "pgsql") {
		$patch['gene']['1']['patch'] = "ALTER TABLE ".TB_PREFIX."invoice_items ADD unit_cost DECIMAL( 25, 6 ) NULL AFTER total;";
	}
	$patch['gene']['1']['date'] = "20080317";
?>
