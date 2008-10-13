<?php


/* 
 * Zend framework init - start
 */
set_include_path(get_include_path() . PATH_SEPARATOR . "./library/");
require_once './library/Zend/Loader.php';
Zend_Loader::loadClass('Zend_Db_Table');
Zend_Loader::loadClass('Zend_Debug');
Zend_Loader::loadClass('Zend_Auth');
Zend_Loader::loadClass('Zend_Session');
Zend_Loader::loadClass('Zend_Session_Namespace');
Zend_Loader::loadClass('Zend_Config_Ini');
Zend_Loader::loadClass('Zend_Acl');
Zend_Loader::loadClass('Zend_Acl_Role');
Zend_Loader::loadClass('Zend_Acl_Resource');

Zend_Session::start();

/* 
 * Zend framework init - end
 */

/*
 * smarty init - start
 */
set_include_path(get_include_path() . PATH_SEPARATOR . "./include");

require_once("smarty/Smarty.class.php");

$smarty = new Smarty();

//cache directory. Have to be writeable (chmod 777)
$smarty -> compile_dir = "cache";
if(!is_writable($smarty -> compile_dir)) {
	exit("Simple Invoices Error : The folder <i>".$smarty -> compile_dir."</i> has to be writeable");
}

//adds own smarty plugins
$smarty->plugins_dir = array("plugins","smarty_plugins");

/*
 * smarty init- end
 */

//TODO: have to be moved to an other place...
require_once("./modules/include/js/lgplus/php/chklang.php");
require_once("./modules/include/js/lgplus/php/settings.php");


$path = pathinfo($_SERVER['REQUEST_URI']);
$install_path = $path['dirname'];

include_once('./config/config.php');

$config = new Zend_Config_Ini('./config/config.ini', $environment);
/*
 * Include another config file if required
 */
if($environment != 'production') {
	 $config = new Zend_Config_Ini('./config/'.$environment.'.config.ini', $environment);
}

include_once('./include/include_auth.php');

include_once("./include/sql_queries.php");

include_once('./include/language.php');

include_once('./include/functions.php');

checkConnection();

include_once('./include/manageCustomFields.php');
include_once("./include/validation.php");

/*
Array: Early_exit
- Pages that don't need header or exit prior to adding the template add in here
*/
$early_exit = array();
$early_exit[] = "auth";
$early_exit[] = "export";


?>
