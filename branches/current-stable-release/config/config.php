<?php

$environment = "dev"; //test,staging,dev,live etc..

define("TB_PREFIX","si_"); // default table prefix si_ -  Old variable: $tb_prefix = "si_";

#####################
/* Authentication options */
#####################
//if you want to make Simple Invoices secure and require a username and password set this to true
$authenticationOn = "false"; // "true"

//if you are using a .httaccess file
$http_auth = ""; //value: "name:password@"


#####################
/* Email configs */
#####################
$email_host = "localhost";  // specify main and backup server - separating with ;
$email_smtp_auth = false;   // turn on SMTP authentication
//$email_smtp_auth = true;     // turn on SMTP authentication
#if authentication is required for the smtp server please add the username and password in the two options below
$email_username = "";  	// SMTP username
$email_password = ""; 	// SMTP password

// The following two variables are referenced in /modules/invoices/email.php which uses the new PHPMailer v2.10 Beta 1 (internal version still at v2.0 RC 2)
// Backwards compatibility maintained even if the following 2 variables are omitted as with retaining an old config.php - Ap.Muthu
$email_smtpport = 25; 	// Default 25 - use 465 for secure ssl
$email_secure = "";  // one among '', 'ssl', or 'tls' - used by PHPMailer class in modules/include/mail
$email_ack = false;   // true means sender's EMail ID will be used as the Return receipt EMail ID - used by PHPMailer class in modules/include/mail

####################
/* General configs */
####################

/* Version Info*/
$version = "20080511 stable";
$versionFriendlyName ="Minor patches + new extension system of the 2008 03 09 release - aka mother day release";
$versionSeries = "200708 series";


####################
/* Extensions */
####################
//1 = enabled 0 = disabled
//name is the director in ./extensions which it lives
$extension['gene']['name'] = "gene";
$extension['gene']['description'] = "gene's purchase order based system extension";
$extension['gene']['enabled'] = "0";
$extension['school']['name'] = "school";
$extension['school']['description'] = "Extend Simple Invoices to be school management system";
$extension['school']['enabled'] = "0";
$extension['test']['name'] = "test extension";
$extension['test']['description'] = "this is a test";
$extension['test']['enabled'] = "0";
// dev guys to enable extensions via your local.config.php file



####################
/* Other stuff*/
####################
#Error reporting
#error_reporting(E_ALL);
#error_reporting(E_WARNING);
#error_reporting(E_ERROR);
#error_reporting(E_ALL & ~E_NOTICE);
#error_reporting(0);

//To turn logging on set the below to true - not needed as it is set in System Defaults
define("LOGGING",false);
#define("LOGGING",true);

if($environment != "live")
{
    @include("./config/".htmlspecialchars($environment).".config.php");
}

?>
