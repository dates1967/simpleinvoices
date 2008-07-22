<?php
/*
* Script: login.php
* 	Login page
*
* License:
*	 GPL v2 or above
*/

$menu = false;
// we must never forget to start the session
//so config.php works ok without using index.php define browse
define("BROWSE","browse");
//print_r($_SESSION);
/*
set_include_path(get_include_path() . PATH_SEPARATOR . "./library/");
require_once './library/Zend/Loader.php';
Zend_Loader::loadClass('Zend_Db_Table');
Zend_Loader::loadClass('Zend_Debug');
Zend_Loader::loadClass('Zend_Auth');
Zend_Loader::loadClass('Zend_Session');
Zend_Loader::loadClass('Zend_Config_Ini');
*/
Zend_Session::start();
/*
echo  substr($_SERVER['SCRIPT_FILENAME'], -9, 5);
require_once 'include/init.php';
*/
// Create an in-memory SQLite database connection
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
//$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array('dbname' => ':memory:'));
/*
$dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array(
    'host'     => $config->database->params->host,
    'username' => $config->database->params->username,
    'password' => $config->database->params->password,
    'dbname'   => $config->database->params->dbname
));
*/
$dbAdapter = Zend_Db::factory($config->database->adapter, array(
    'host'     => $config->database->params->host,
    'username' => $config->database->params->username,
    'password' => $config->database->params->password,
    'dbname'   => $config->database->params->dbname)
);

$errorMessage = '';
if (isset($_POST['user']) && isset($_POST['pass'])) {

	require_once 'Zend/Auth/Adapter/DbTable.php';

	// Configure the instance with constructor parameters...
	//$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter, 'users', 'username', 'password');

	// ...or configure the instance with setter methods
	$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
	$authAdapter->setTableName(TB_PREFIX.'customers')
				->setIdentityColumn('username')
				->setCredentialColumn('password')
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
		$result = $dbAdapter->fetchRow('
			SELECT 
				u.id as user_id, u.email, u.name as last_name, u.first_name as first_name, u.user_group, r.name as role_name, u.branch_id as user_domain 
			FROM 
				si_customers u, si_user_role r 
			WHERE 
				username = ? AND u.user_group = r.id', $userEmail
		);
		
		/*
		* chuck the user details sans password into the Zend_auth session
		*/
		$authNamespace = new Zend_Session_Namespace('Zend_Auth');
		foreach ($result as $key => $value)
		{
			$authNamespace->$key = $value;
		}

		$auth_session->role_name == "student" ? header('Location: index.php?module=customers&view=details&action=view&id='.$auth_session->user_id) : header('Location: .') ; 
		//header('Location: .'); 

	} else {
	
        $errorMessage = 'Sorry, wrong user / password';
	
	}

}

$smarty->assign("errorMessage",$errorMessage);

?>
