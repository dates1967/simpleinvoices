<?php

/*
* Script: login.php
* 	Login page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*/

// we must never forget to start the session
//so config.php works ok without using index.php define browse
define("BROWSE","browse");

set_include_path(get_include_path() . PATH_SEPARATOR . "./library/");
require_once './library/Zend/Loader.php';
Zend_Loader::loadClass('Zend_Db_Table');
Zend_Loader::loadClass('Zend_Debug');
Zend_Loader::loadClass('Zend_Auth');
Zend_Loader::loadClass('Zend_Session');
Zend_Loader::loadClass('Zend_Config_Ini');

Zend_Session::start();

require_once 'include/init.php';

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

if (isset($_GET['logout']))
{
	Zend_Session::destroy(true);
	header('Location: login.php');
}


$errorMessage = '';
if (isset($_POST['user']) && isset($_POST['pass'])) {

	require_once 'Zend/Auth/Adapter/DbTable.php';

	// Configure the instance with constructor parameters...
	//$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter, 'users', 'username', 'password');

	// ...or configure the instance with setter methods
	$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
	$authAdapter->setTableName(TB_PREFIX.'users')
				->setIdentityColumn('user_email')
				->setCredentialColumn('user_password')
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
				u.user_id, u.user_email, u.user_name, u.user_group, r.name as role_name, u.user_domain 
			FROM 
				si_users u, si_user_role r 
			WHERE 
				user_email = ? AND u.user_group = r.id', $userEmail
		);
		
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
	
        $errorMessage = 'Sorry, wrong user / password';
	
	}

} 
?>
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Invoices Login</title>
<link rel="stylesheet" type="text/css" href="./templates/default/css/login.css">

</head>

<body class="login" >
	<div class="Container">


<?php

if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?>
<div id="Dialog">

<h1>Simple Invoices</h1>


	    <form action="" method="post" name="frmLogin" id="frmLogin" <?php if($MD5Auth==True){?>onSubmit="return login(this);"<?php }?>>
	        <input type="hidden" name="action" value="login" />
		<input type="hidden" name="cookieverify" value="" />
		<input type="hidden" name="redirect" value="" />

                <?php if($MD5Auth==True){?>
                <input type="hidden" name="md5" value="">
                <?php }?>		            
                <?php if($ChallengeLife>0){?>
                <input type="hidden" name="ChallengeKey" value="<?php echo $Challenge_Key;?>">
                <?php }?>		            

  	<dl>
  		<dt>Email:</dt>
  		<dd><input name="user" type="text" id="user" value="" /></dd>

  		<dt>Password:</dt>
  		<dd>
  		  <input name="pass" type="password" id="pass" value="" />
			<!--
  		  <span>(<a href="login.php">I forgot my password/username</a>)</span>
			-->
  		</dd>
<!--TODO add language select drop down here -->
<!--
      		<dd><input type="checkbox" name="remember_me" /> Remember me on this computer</dd>
-->
		<dd> <input type="submit" value="login" /></dd>


<!--  		<dd><input type="submit" value="Sign in" /></dd> -->
<!--
	        <label for="username">Username</label>
		<input  name="user" type="text" id="user"/>
			<BR>
		<label for="password">Password</label>
		<input name="pass" type="password" id="pass"/>
-->
		<!--
		<label for="language">Language</label>
		<select id="language" name="language">
				    <option value="en" SELECTED="yes">English (United States)</option>

				</select>
               	-->
<!--
	        <div class="form_actions">
                   <dd> <input type="submit" value="login" /></dd>
		</div>
-->
  	</dl>
            </form>

	</div>
        
		<dd>Powered by <a href="http://www.simpleinvoices.org">Simple Invoices</a></dd>

    </div>

</body>
</html>
