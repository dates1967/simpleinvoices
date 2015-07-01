# Introduction #
There are several thing a contributor should take care. Since security is becoming more and more an issue we need to stick to some rules in order to make SI saver.

Table of Contents



---


# Security #
With the following commands the output can be sanitized/escaped.

## Within Templates ##

| |htmlsafe | escape html|
|:----------|:-----------|
| |urlesafe | sanitises a whole url to be put into src or href. Will not allow javascript: urls.|
| |urlencode | escapes something to be put into a query string|
| |outhtml  | sanitises raw html for output.|

## Outside of Templates ##

| htmlsafe() | escape html|
|:-----------|:-----------|
| urlesafe() | sanitises a whole url to be put into src or href. Will not allow javascript: urls.|
| urlencode() | escapes something to be put into a query string|
| outhtml()  | sanitises raw html for output.|


---


# Developer FAQs #


## How to display PHP errors on screen ##

Edit config/config.ini and set

```
debug.error_reporting 				= E_ALL
phpSettings.display_startup_errors 	        = 1
phpSettings.display_errors 			= 1
```


In general you should always show all error messages while you develop. This helps us to get a better and more stable code.


---


## How to write a SQL Patch ##

To add a sql patch in Simple Invoices follow the steps below:

  * Write the sql for this patch in a way that wont mess with anyone data
    * that includes not changing the encoding of rows etc..
  * Once you've got the sql for the patch written open up the file include/sql\_patches.php and copy the format of the other sql patches to create
    * $sql\_patch\_name_is the name of the patch
      * ie. $sql\_patch\_name\_8 = "Edit default invoice template field lenght to 50";
      * $sql\_patch\_8 is the actual sql for the patch
      * ie. $sql\_patch\_8 = "ALTER TABLE si\_defaults CHANGE def\_inv\_template def\_inv\_template VARCHAR( 50 ) DEFAULT NULL";
      * $sql\_patch\_update_ is the sql to insert a row into the sql patchmanger table to say that the patch has been applied
      * ie. $sql\_patch\_update\_8 = "INSERT INTO si\_sql\_patchmanager ( sql\_id ,sql\_patch\_ref , sql\_patch , sql\_release , sql\_statement ) VALUES (,8,'$sql\_patch\_name\_8',20060526,)";

file::/include/sql\_patches.php

  * Once the patch has been written the database\_sqlpatches.php file has to be update to check and run this patch
    * open the file and add your patch to the run code
    * copy the format used for the other patches ie. run\_sql\_patch(8,$sql\_patch\_name\_8,$sql\_patch\_8,$sql\_patch\_update\_8);
    * edit the file to add the sql for sql patch code
    * copy the format used for the other patches
    * ie. check\_sql\_patch(8,$sql\_patch\_name\_8);
file::/database\_sqlpatches.php

  * Now if you go to the Database Upgrade Manager page in Simple Invoices if will give you a list of all the patches that have and have not been applied, if alls well it should say that your newly added patch hasnt been applied.

  * To run the sql patch to make sure it works click the UPDATE button in the Database Upgrade Manager screen and Simple Invoices will check which patches have been applied and applied the ones that havent been applied. If this works fine you can commit you sql patch to subversion


---


## Subversion access ##
If you have an intention of commiting code to Simple Invoices register in the dev mailinglist at http://dev.simpleinvoices.org/ and then email us with your gmail username and we will add you as a project member. In order to get your subversion password go to the page http://code.google.com/hosting/settings


### Check Out ###
To checkout a copy of Simple Invoices in the command line. Use the following command:
```
svn checkout https://simpleinvoices.googlecode.com/svn/trunk/ simpleinvoices --username (YOUR GMAIL USERNAME ie, justin if your email is justin@gmail.com)
```

**when asked for your password use your google subversion password NOT your gmail password**


If you wish to check out subversion anonymously (which means you WONT be able to check the project in if you make any changes) but you will get the latest code
```
svn checkout http://simpleinvoices.googlecode.com/svn/trunk/ simpleinvoices
```

refer:
  * http://code.google.com/p/simpleinvoices/source/checkout

### Commiting ###

> NOTE: you can only commit code into Simple Invoices if you have checked out the code using HTTPS and your gmail name

Before you commit some code please check always that there are at least no compile errors. You can do this by calling this command (under Linux):
```
find ./ -type f -name \*.php -exec php -l -d error_reporting=32767 '{}' \; | grep -v "No syntax errors detected"
```

And please check your httpd error log as well if you have some run-time errors like e.g. uninitialized variables.

### Monitoring ###

Each time a commit it made to our svn and email automatically gets sent to our tracker at http://tracker.simpleinvoices.org/

Register yourself there if you want to know what code is commited and and issues have been solved etc.


---


## 3rd Party Libraries ##

SimpleInvoices leverages the following third party libraries for the [[Domain Version](Single.md)] (SDV) and [[Domain Version](Multi.md)] (MDV) (unless specifically indicated). Paths for the libraries may be different. SDV will have libraries in /include and /modules/include but MDV has all libraies in /include.

| **Solution** | **License** | **Integration Notes** |
|:-------------|:------------|:----------------------|
|http://www.jquery.com/|jquery  | GPL         |                       |
|[jquery autocomplete](http://www.dyve.net/jquery/?autocomplete)  | GPL         |                       |
|[jquery tabs](http://stilbuero.de/jquery/tabs/)  | GPL         |                       |
|[jquery accordian menu](http://fmarcia.info/jquery/accordion.html)]  | GPL/MIT?    |                       |
|[jquery data selector](http://kelvinluck.com/assets/jquery/datePicker/)  | GPL/MIT?    |                       |
|[GreyBox](http://orangoo.com/labs/GreyBox/)  | LGPL        |                       |
|[AJS JavaScript library](http://orangoo.com/labs/AJS/)  | LGPL        |                       |
|[Open Rico Live Grid Plus](http://dowdybrown.com/dbprod/)  | Apache 2.0  |                       |
|[ADxMenu](http://www.aplus.co.yu/adxmenu/)  | CC          |                       |
|[TinyMCE](http://tinymce.moxiecode.com/)  | LGPL        |                       |
|[PHPReports](http://phpreports.sourceforge.net/)  | GPL         | PHPReport mods - Rare PHPReport Error Fixes|
|[Javascript MD5](http://pajhome.org.uk/crypt/md5/index.html)  | BSD         |                       |
|[Smarty Template Engine](http://smarty.php.net/)  | LGPL        |                       |
|[Tango icons](http://tango.freedesktop.org/)  | CC          |                       |
|[FamFamFam silk icons](http://www.famfamfam.com/lab/icons/silk/)  | CC          |                       |
|[PHPMailer](http://phpmailer.codeworxtech.com/)  | CC          | Phpmailer and SMTP class files can just be replaced  |