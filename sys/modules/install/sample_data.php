<?php

$menu = false;


//if (SimpleInvoices_Db::tableExists("billers") == false)
//{
//	echo "SCHEME";
	//SQL import
	//JSON import
	$samplejson = new importjson();
	$samplejson->file = $include_dir . "sys/databases/json/sample_data.json";
	//$samplejson->debug = true;
	$samplejson->pattern_find = array('si_','DOMAIN-ID','LOCALE','LANGUAGE');
	$samplejson->pattern_replace = array(TB_PREFIX,'1','en_GB','en_GB');
	if($db->query($samplejson->collate()) )
	{
		$saved=true;
	} else {
		$saved=false;
	}
//}

$smarty -> assign("saved",$saved);

