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
define("BROWSE","browse");

Zend_Session::start();
/*
echo  substr($_SERVER['SCRIPT_FILENAME'], -9, 5);
require_once 'include/init.php';
*/
// Create an in-memory SQLite database connection
////require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
//$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array('dbname' => ':memory:'));
/*
$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array(
    'host'     => $config->database->params->host,
    'username' => $config->database->params->username,
    'password' => $config->database->params->password,
    'dbname'   => $config->database->params->dbname
));
*/
/*
$dbAdapter = Zend_Db::factory($config->database->adapter, array(
    'host'     => $config->database->params->host,
    'username' => $config->database->params->username,
    'password' => $config->database->params->password,
    'dbname'   => $config->database->params->dbname)
);
*/
$errorMessage = '';
if (!empty($_POST['value'])) {
    $cust_language = $_POST['value'];
    $language = $cust_language;
    $smarty -> assign("LANG",getLanguageArray());
}

if (!empty($_POST['user']) && !empty($_POST['pass'])) 
{
    $errorMessage = setDefaultLanguage($_POST['value']);  
////	require_once 'Zend/Auth/Adapter/DbTable.php';

	// Configure the instance with constructor parameters...
	//$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter, 'users', 'username', 'password');

	// ...or configure the instance with setter methods
	$authAdapter = new Zend_Auth_Adapter_DbTable($zendDb);

	//sql patch 161 changes user table name - need to accomodate
	$user_table = (getNumberOfDoneSQLPatches() < "161") ? "users" : "user";
	$user_email = (getNumberOfDoneSQLPatches() < "184") ? "user_email" : "email";
	$user_password = (getNumberOfDoneSQLPatches() < "184") ? "user_password" : "password";

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
		
		Zend_Session::start();

		/*
		* grab user data  from the datbase
		*/

        $usertable = TB_PREFIX.'user';
        $userroletable = TB_PREFIX.'user_role';
        
		//patch 147 adds user_role table - need to accomodate pre and post patch 147
		if (getNumberOfDoneSQLPatches() < "147")
		{
			$result = $zendDb->fetchRow('
				SELECT u.user_id as id, u.user_email, u.user_name FROM '.$usertable.' u WHERE user_email = ?', $userEmail);
			$result['role_name']="administrator";
		}

		if ( (getNumberOfDoneSQLPatches() >= "147") && ( getNumberOfDoneSQLPatches() < "184") )
		{
			$result = $zendDb->fetchRow('
				SELECT u.user_id as id, u.user_email, u.user_name, r.name as role_name, u.user_domain_id FROM '.$usertable.' u, '.$userroletable.' r 
				WHERE u.user_email = ? AND u.user_role_id = r.id', $userEmail
			);
		}		
		if (getNumberOfDoneSQLPatches() >= "184")
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
$lang = getDefaultLanguage();
    
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
    $value .= "<option $selected value='".htmlsafe($language->shortname)."'>".htmlsafe("$language->name")."</option>";
}
$value .= "</select>";

if($_POST['action'] == 'login' && (empty($_POST['user']) OR empty($_POST['pass'])))
{
   $errorMessage = $LANG['Required_UIDPWD'];
}

$smarty->assign("errorMessage",$errorMessage);
$smarty->assign("value",$value);
$smarty->assign("version_id", SI_VERSION_TITLE);
?>
