# config/config.ini settings #

This page details the various options in the Simple Invoices config file ( config/config.ini )


---


## Database ##

### .ini ###
```
database.adapter        			= pdo_mysql
database.utf8        	              		= true
database.params.host     			= localhost
database.params.username 			= root
database.params.password 			= 
database.params.dbname   			= simple_invoices
database.params.port   		        	= 3306
```

### Description ###

The 'database.' section details your database connection details.

| **Options** | **Description** |
|:------------|:----------------|
| adapter     | Default is 'pdo\_mysql' |
| utf8        | Default is 'true'.  If you have problems with inputted data with non-latin characters set this to false and retry |
| host        | Enter the server name that your Simple Invoices database is on.  This is normally 'localhost' |
| username    | The username to connect to your database |
| password    | The password for the above user |
| dbname      | Enter the name of the database you are using for Simple Invoices ie. 'simpleinvoices' |
| port        | The default MySQL port is 3306.  If your instance is different enter it here |


---


## Authentication ##

### .ini ###
```
authentication.enabled	 			= false
authentication.http 				= 
```

### Description ###

| **Options** | **Description** |
|:------------|:----------------|
| .enabled    | Authentication is disabled by default,  Enter 'true' to turn it on.  Note: the default username is 'demo@simpleinvoices.org' and password is 'demo' |
| .http       | entre 'true' to use Apaches .htpasswd system.  Note: its up to you to create the .htpasswd file |


---


## Data Export ##

### .ini ###
```
export.spreadsheet		 		= xls
export.wordprocessor	 			= doc
export.pdf.screensize 	 			= 800
export.pdf.papersize  	 			= A4
export.pdf.leftmargin	 			= 15
export.pdf.rightmargin	 			= 15
export.pdf.topmargin	 			= 15
export.pdf.bottommargin 			= 15
```

### Descritpion ###

| **Options** | **Description** |
|:------------|:----------------|
| .spreadsheet | Enter 'xls' for MS Excel export, use 'ods' for Open Document export |
| .wordprocessor | Enter 'doc' for MS Word export, use 'odt' for Open Document export |
| .pdf.screensize | Screen resolution for PDF|
| .pdf.papersize | Papersize for PDF.  Can be A4, Letter, etc..|
| .pdf.leftmargin | Left indent margin width|
| .pdf.rightmargin | Right indent margin width|
| .pdf.topmargin | Top indent margin width|
| .pdf.bottommargin | Bottom indent margin width|


---


## Localization ##

### .ini ###
```
local.locale					= en-gb
local.precision					= 2
```

### Descritpion ###

| **Options** | **Description** |
|:------------|:----------------|
| .locale     | This sets the location dependent (date, money, numbers, etc..) formatting used in Simple Invoices, refer: http://unicode.org/cldr/data/diff/supplemental/languages_and_territories.html for list of all locales |
| .precision  | This is the number of decimal places to format numbers with.  Default is 2 |


---


## Email settings ##

### .ini ###
```
email.host 					= localhost
email.smtp_auth				 	= false
email.username			 		=  
email.password 					= 
email.smtpport			 		= 25
email.secure      				= 
email.ack 					= false
```

### Description ###
| **Options** | **Description** |
|:------------|:----------------|
| .host       | The server name of your outgoing email server.  This is normally 'localhost' |
| .smtp\_auth | Enter 'true' if yoour out going email server requies a username and password to send |
| .username   | The username if smtp\_auth is 'true' |
| .password   | The password if smtp\_auth is 'true' |
| .smtpport   | The port number for the mail server. Default is 25, use 465 for secure ssl |
| .secure     | Email security type, default is '', others are 'ssl' or 'tls' |
| .ack        | If you want a read receipt of the email set this to 'true'|


---


## Debug level ##

### .ini ###
```
debug.level 						= All
```

### Description ###
The debug level used within Simple Invoices
| **Options** | **Description** |
|:------------|:----------------|
| None        | Off             |
| All         | On              |


---


## Error reporting ##

### .ini ###
```
debug.error_reporting 					= 0
```

### Description ###

This sets the PHP error reporting level, refer: http://au.php.net/manual/en/function.error-reporting.php for full PHP list

Main ones to use are
| **Error\_reporting level** | **Description** |
|:---------------------------|:----------------|
| 0                          | Turn off errors |
| -1                         | Show all errors - same as E\_ALL |
| E\_STRICT                  | PHP interoperability and compatibility errors |
| E\_ERROR                   | Show simple running errors |


---


## Timezone ##

### .ini ###
```
phpSettings.date.timezone 			= UTC
```

### Description ###
Set this to your timezone, UTC is the default. Refer: http://au.php.net/manual/en/timezones.php for the list of all timezones


---


## Display errors ##

### .ini ###
```
phpSettings.display_startup_errors 	        = 0
phpSettings.display_errors 			= 0
```

### Description ###

This sets the php settings for displaying errors
| **Options** | **Description** |
|:------------|:----------------|
| 0           | Off             |
| 1           | On              |


---


## Version info ##

### .ini ###
```
version.name					= 2009.1
```

### Description ###
Details the version of Simple Invoices that you are using


---


## config/define.php settings ##

### Environment ###

If $environment is not = "production" then this allows you to have another local config file for your dev or other purposes //ie. dev.config.ini//

any config.ini setting in this extra file(which wont be kept in svn) will overwrite config.ini values

this way everyone can have there own conf setting without messing with anyones setting

```
/*
RELEASE TODO: make sure $environment is set back to live
*/
$environment = "dev"; //test,staging,dev,live etc..

define("TB_PREFIX","si_"); // default table prefix si_ -  Old variable: $tb_prefix = "si_";

```