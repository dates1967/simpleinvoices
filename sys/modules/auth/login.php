<?php
/*
* Script: login.php
* 	Login page
*
* License:
*	 GPL v3 or above
*/
$menu = false;
// we must never forget to start the session
//so config.php works ok without using index.php define browse
if (!defined('BROWSE')) {
	define("BROWSE","browse");
}


/*
echo  substr($_SERVER['SCRIPT_FILENAME'], -9, 5);
require_once 'include/init.php';
*/
// Create an in-memory SQLite database connection
////require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
//$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array('dbname' => ':memory:'));
/*
$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array(
    'host'     => $config->resources->db->params->host,
    'username' => $config->resources->db->params->username,
    'password' => $config->resources->db->params->password,
    'dbname'   => $config->resources->db->params->dbname
));
*/
/*
$dbAdapter = Zend_Db::factory($config->resources->db->adapter, array(
    'host'     => $config->resources->db->params->host,
    'username' => $config->resources->db->params->username,
    'password' => $config->resources->db->params->password,
    'dbname'   => $config->resources->db->params->dbname)
);
*/
$errorMessage = '';
if (!empty($_POST['value'])) {
    $cust_language = $_POST['value'];
    $language = $cust_language;
    $smarty -> assign("LANG",getLanguageArray());
}

// System defaults are needed in several places
$system_defaults = new SimpleInvoices_Db_Table_SystemDefaults();

if (!empty($_POST['user']) && !empty($_POST['pass']))
{ 
    $errorMessage = $system_defaults->update('language', $language);
////	require_once 'Zend/Auth/Adapter/DbTable.php';

	// Configure the instance with constructor parameters...
	//$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter, 'users', 'username', 'password');

	// ...or configure the instance with setter methods
	$authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

	//sql patch 161 changes user table name - need to accomodate
	$user_table = (SimpleInvoices_Db_Table_SQLPatchManager::getNumberOfDoneSQLPatches() < "161") ? "users" : "user";
	$user_email = (SimpleInvoices_Db_Table_SQLPatchManager::getNumberOfDoneSQLPatches() < "184") ? "user_email" : "email";
	$user_password = (SimpleInvoices_Db_Table_SQLPatchManager::getNumberOfDoneSQLPatches() < "184") ? "user_password" : "password";

	$authAdapter->setTableName(TB_PREFIX.$user_table)
				->setIdentityColumn($user_email)
				->setCredentialColumn($user_password)
				->setCredentialTreatment('MD5(?)');

    $userEmail   = $_POST['user'];
    $password = $_POST['pass'];

	// Set the input credential values (e.g., from a login form)
	$authAdapter->setIdentity($userEmail)
	            ->setCredential($password);

	// Perform the authentication query, saving the result
	$result = $authAdapter->authenticate();

	if ($result->isValid()) {

		Zend_Session::regenerateId();

		/*
		* grab user data  from the datbase
		*/
        $zendDb = Zend_Db_Table::getDefaultAdapter();
        
        $usertable = TB_PREFIX.'user';
        $userroletable = TB_PREFIX.'user_role';

		//patch 147 adds user_role table - need to accomodate pre and post patch 147
		if (SimpleInvoices_Db_Table_SQLPatchManager::getNumberOfDoneSQLPatches() < "147")
		{
			$result = $zendDb->fetchRow('
				SELECT u.user_id as id, u.user_email, u.user_name FROM '.$usertable.' u WHERE user_email = ?', $userEmail);
			$result['role_name']="administrator";
		}

		if ( (SimpleInvoices_Db_Table_SQLPatchManager::getNumberOfDoneSQLPatches() >= "147") && ( SimpleInvoices_Db_Table_SQLPatchManager::getNumberOfDoneSQLPatches() < "184") )
		{
			$result = $zendDb->fetchRow('
				SELECT u.user_id as id, u.user_email, u.user_name, r.name as role_name, u.user_domain_id FROM '.$usertable.' u, '.$userroletable.' r
				WHERE u.user_email = ? AND u.user_role_id = r.id', $userEmail
			);
		}
		if (SimpleInvoices_Db_Table_SQLPatchManager::getNumberOfDoneSQLPatches() >= "184")
		{
			$result = $zendDb->fetchRow("
				SELECT u.id, u.email, r.name as role_name, u.domain_id FROM ".$usertable." u, ".$userroletable." r
				WHERE u.email = ? AND u.role_id = r.id AND u.enabled = '".ENABLED."'", $userEmail
			);
		}
		/*
		* chuck the user details sans password into the Zend_auth session
		*/
		$authNamespace = new Zend_Session_Namespace('Zend_Auth');

		foreach ($result as $key => $value)
		{
			$authNamespace->$key = $value;
		}
		header('Location: .');

	} else {
      $errorMessage = $LANG['badd_UIDPWD'];
	}

}

// if wrong or invalid credentials are added than the languagelist
// must be rebuild (aducom)

$default = "language";
$languages = getLanguageList($include_dir . 'sys/lang/');
$lang = $system_defaults->findByName('language');

usort($languages,"compareNameIndex");

//print_r($languages);
$value = "<select name='value'>";
if (!isset($cust_language)) {
    $cust_language=$lang;
}

foreach($languages as $language) {
    $selected = "";
    if($language->shortname == $cust_language) {
        $selected = " selected ";
    }
    $value .= "<option $selected value='".htmlsafe($language->shortname)."'>".htmlsafe($language->name)."</option>";
}
$value .= "</select>";

if(isset($_POST['action']) && $_POST['action'] == 'login' && (empty($_POST['user']) OR empty($_POST['pass'])))
{
   $errorMessage = $LANG['Required_UIDPWD'];
}

$smarty->assign("errorMessage",$errorMessage);
$smarty->assign("value",$value);


/**
 * Help function for sorting the language array by name
 */
function compareNameIndex($a,$b) {
	$a = $a->name."";
	$b = $b->name."";

	if($a > $b) {
		return 1;
	}
	return -1;
}