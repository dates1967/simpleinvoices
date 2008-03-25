<?php


	$patch['gene']['1']['name'] = "Add unit_cost to invoice items table";
	$patch['gene']['1']['patch'] = "ALTER TABLE ".TB_PREFIX."invoice_items ADD unit_cost DECIMAL( 25, 6 ) NULL AFTER total;";
    if ($db_server == "pgsql") {
		$patch['gene']['1']['patch'] = "ALTER TABLE ".TB_PREFIX."invoice_items ADD unit_cost DECIMAL( 25, 6 ) NULL AFTER total;";
	}
	$patch['gene']['1']['date'] = "20080317";
	//ALTER TABLE si_invoice_items ADD unit_cost DECIMAL( 25, 6 ) NULL AFTER total;

	$patch['gene']['2']['name'] = "Add unit_cost to invoice items table";
	$patch['gene']['2']['patch'] = "ALTER TABLE ".TB_PREFIX."_products ADD unit_cost DOUBLE( 25, 6 ) NULL AFTER unit_price ;";
    if ($db_server == "pgsql") {
		$patch['gene']['2']['patch'] = "ALTER TABLE ".TB_PREFIX."products ADD unit_cost DOUBLE( 25, 6 ) NULL AFTER unit_price ;";
	}
	$patch['gene']['2']['date'] = "20080321";
	//ALTER TABLE `si_products` ADD `unit_cost` DOUBLE( 25, 6 ) NULL AFTER `unit_price` ;


	$patch['gene']['3']['name'] = "Add unit_load_cost to invoice items table";
	$patch['gene']['3']['patch'] = "ALTER TABLE si_invoice_items ADD unit_load_cost DECIMAL( 25, 6 ) NOT NULL AFTER unit_cost ;";
    if ($db_server == "pgsql") {
		$patch['gene']['3']['patch'] = "ALTER TABLE ".TB_PREFIX."invoice_items ADD unit_load_cost DECIMAL( 25, 6 ) NOT NULL AFTER unit_cost ;";
	}
	$patch['gene']['2']['date'] = "20080325";
	//ALTER TABLE `si_invoice_items` ADD `unit_load_cost` DECIMAL( 25, 6 ) NOT NULL AFTER `unit_cost` ;
?>
