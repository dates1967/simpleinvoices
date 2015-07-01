
# How to... #

## ... enable the login system ##

Simple Invoices has an optional login system to allow you to protect your install of Simple Invoices with a username/password system.

If you are using a version of Simple Invoices later than 2007 08 then all you have to do is edit config/config.ini and set authentication.enabled to true.

To do this just change the file from
```
authentication.enabled	       = false
```

to
```
authentication.enabled	       = true
```

For more information see [the authentication section in the config wiki](http://code.google.com/p/simpleinvoices/wiki/Config#Authentication)

That's it - you can login with:

| Email address | demo@simpleinvoices.org |
|:--------------|:------------------------|
| Password      | demo                    |

Since Simple Invoices 2009.1 you can edit a username and password within Simple Invoices - go to the People tab and select Users.

For developers: The password is hashed in the DB with MD5(new\_password).

## ... backup the database ##
For 'Simple invoices database backup' to work the first step is to make the tmp/database\_backups directory(which is in the Simple Invoices directory) writeable by the webserver
  * To do this the in unix cd to the Simple Invoices directory (cd /var/www/html/simpleinvoices) and chown the tmp/database\_backups directory to the apache(web server) user (chown apache:apache tmp/database\_backups), in windows just browse to the tmp/database\_backups folder and make sure its writeable by all users.

...second step?

## ... add a new logo ##
To make a new logo available in Simple Invoices just copy the logo file from your computer into the logo directory in the Simple Invoices folder
  * in unix the Simple Invoices folder will usually be /var/www/html/simpleinvoices
  * just copy your new logo file into /var/www/html/simpleinvoices/templates/invoices/logos/

Note - on an ubuntu 6.06.1 server it's /var/www/simpleinvoices/templates/invoices/logos/your\_logo.jpg

Now the logo should be available in Simple Invoices.

## ... get reports working on Windows/WAMP5 ##
To enable reports to work when using Windows and using WAMP5

open the php.ini, find the line ;extension=php\_xsl.dll and remove the ;

from
```
;extension=php_xsl.dll
```
to
```
extension=php_xsl.dll
```
then restart the WAMP5 server to enable this option.

## ... send emails ##
For Simple Invoices to be able to send email you need access to an smtp server. This can be your ISP's smtp server or other. But if you don't have access to an smtp server you can install one on your PC. Below details some of the available option for each operating system

### Windows ###
  * Mercury/Pegasus mail
    * http://www.pmail.com/index.htm
    * http://www.pmail.com/downloads_s3_t.htm (free)
    * http://www.softstack.com/freesmtp.html (free)
    * http://www.axigen.com (not-free)

### Mac ###
If your not on mac osx server or sendmail isn't installed on your system you can use the below listed:
  * http://postfix.darwinports.com/ (free)
  * http://cutedgesystems.com/software/postfixenabler/ (not-free)

### Linux ###
If your version of linux doesn't already come installed with one of the below listed mail servers, please install one as per your distributions installation procedure

  * Postfix (free) ← This is the easiest option
  * Sendmail (free)

### Gmail ###

You can use Google GMail to send emails in Simple Invoices.

Example SMTP Settings From Google's Gmail:
  * Outgoing Mail (SMTP) Server - requires TLS or SSL: smtp.gmail.com (use authentication)
  * Use Authentication: Yes
  * Port for TLS/STARTTLS: 587
  * Port for SSL: 465

Steps
  * In the simple invoices configuration file (located at “conf/config.ini”) find the options starting with “email.”
  * Using the information in the example above you would set you config.ini to look like this:
```
email.host = smtp.gmail.com
email.smtp_auth	 = true
email.username	 = mylogin@gmail.com
email.password = mypassword
email.smtpport	 = 465
email.secure = SSL
email.ack = false
```
Note: Be sure that SMTP/POP access is enabled in your email settings, and that your using the correct port, the SSL port is recomended not just for security but because some ISPs and/or firewalls may interfer otherwise.

For more information see here: http://simpleinvoices.org/forum/discussion/1307//#Item_26

## ... change the invoice number starting point ##
Say you want the have the invoice number start at 1000 instead of 1.

Open phpMyAdmin, go to your Simple Invoices database, then find the si\_index table. Then click browse, the data should look something like
|id	|node	|sub\_node	|sub\_node2	|domain\_id|
|:--|:----|:---------|:----------|:---------|
|1 	|invoice 	|1	        |	          |1         |

edit this row and change it to below
|id	|node	|sub\_node	|sub\_node2	|domain\_id|
|:--|:----|:---------|:----------|:---------|
|999 	|invoice 	|1	        |	          |1         |

or just execute the below SQL
```
DELETE FROM `si_index`;
INSERT INTO `si_index` VALUES('999','invoice','1',' ','1');
```

Notice: notice: if someone need to start with 21 the first ID should be 20.

## ... convert numbers to words ##
  1. download this script http://download.pear.php.net/package/Numbers_Words-0.16.2.tgz
  1. extract the downloaded file and copy Numbers folder to library/ folder in SI directory
  1. open "includes/class/export.php"
  1. at line 2 add this: include('./library/Numbers/Words.php');
  1. on the same file search for line 216 - you'll find: $customFieldLabels = getCustomFieldLabels();
  1. right below this line paste this:
```
$nw = new Numbers_Words();
$invoice['total_in_words'] = $nw->toWords( $invoice['total']);
$invoice['total_in_words_currency'] = $nw->toCurrency( $invoice['total']);
```
  1. save "includes/class/export.php" file :p
  1. open "templates/invoices/default/template.tpl" (or the template.tpl of the template you're using) and wherever you want to appear the "words" paste this:
```
{$invoice.total_in_words} -for total value of the invoice in words
```
or/and
```
{$invoice.total_in_words_currency} - for total value of the invoice in currency
```
  1. save "templates/invoices/default/template.tpl" file
  1. clear your cache folder ( /tmp/cache/ )
  1. open a new invoice in the print view

For more information see here: http://simpleinvoices.org/forum/discussion/1236/numbers-to-words/#Comment_6738

## ... make the file size of PDFs smaller ##
As posted in the fourm here : http://simpleinvoices.org/forum/discussion/comment/8607/#Comment_8607

edit the file library/pdf/config.inc.php and change the following line:
```
define('FONT_EMBEDDING_MODE', 'config');
```
to
```
define('FONT_EMBEDDING_MODE', 'none');
```