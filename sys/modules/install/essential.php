<?php

$menu = false;

if ( (SimpleInvoices_Db::tableExists("customers") == true) AND ($install_data_exists == false) )
{
//	echo "ESSENTIAL";
	//JSON import
	$importjson = new importjson();
	$importjson->file = $include_dir ."/sys/databases/json/essential_data.json";
	//$importjson->debug = true;
	$importjson->pattern_find = array('si_','DOMAIN-ID','LOCALE','LANGUAGE');
	$importjson->pattern_replace = array(TB_PREFIX,'1','en_GB','en_GB');
	//dbQuery($importjson->collate());
	$db->query($importjson->collate());
}
