<?php

require_once("init.php");

// needed for /lib/phpreports to function
$val = ini_get("include_path");
// PATH_SEPARATOR is ":" for non-windows and ":" for windows
$val = $val . PATH_SEPARATOR . "../lib/phpreports";
ini_set("include_path", $val);

$db_server=substr($config->resources->db->adapter, 4);
require_once($include_dir . "lib/phpreports/PHPReportMaker.php");

//stop the direct browsing to this file - let index.php handle which files get displayed
if (!defined("BROWSE")) {
   echo "You Cannot Access This Script Directly, Have a Nice Day.";
   exit();
}

	$oRpt = new PHPReportMaker();

	$oRpt->setUser($config->resources->db->params->username);
	$oRpt->setPassword($config->resources->db->params->password);
	$oRpt->setDatabase($config->resources->db->params->dbname);

/*	
if($db_layer == "")
{
// Non PDO usage
	$oRpt->setConnection($db_host); 
	$oRpt->setDatabaseInterface($db_server);
// End Non PDO usage
}
if($db_layer == "pdo")
{
*/
/*
// PDO Usage
   $oRpt->setDatabaseInterface("pdo");
   if ($db_server == 'pgsql') {
	  $connect = "pgsql:host=".$config->resources->db->params->host;
   } else {
	 echo $connect = "mysql:host=".$config->resources->db->params->host;
   }
   $oRpt->setConnection($connect);
// End PDO Usage
/*
}

*/
	$oRpt->setConnection($config->resources->db->params->host.':'.$config->resources->db->params->port);  
	$oRpt->setDatabaseInterface($db_server); // set as $db_server in trunk
	//$oRpt->setDatabase($db_name);
