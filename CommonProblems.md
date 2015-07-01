# Common Problems #

Table of Contents



---


## No data showing in the grid ##

A number of users report that no data display in the 'grid/manage' pages

ie. http://demo.simpleinvoices.org/index.php?module=invoices&view=manage
The most common cause for this is that the PHP error\_reporting level is set to high and that messages are being displayed in the xml file (that the grids use) which cause the grids not to show data/

Fix:

Edit your php.ini file and change error\_reporting to 'error\_reporting = E\_ERROR'
In linux the php.ini file is normally /etc/ directory
In WAMP/MAMP it should be in the MAMP php folder
Note:

Also refer the below page for Simple Invoices config settings that can help this issue
http://simpleinvoices.org/wiki/how_to_display_php_errors_on_screen#how_to_not_display_php_errors_on_screen


---


## How to display PHP errors ##

Edit config/config.ini and set
```
debug.error_reporting 				= E_ALL
phpSettings.display_startup_errors 	        = 1
phpSettings.display_errors 			= 1
```


---


## How to hide PHP errors on screen ##

Edit config/config.ini and set
```
debug.error_reporting 				= 0
phpSettings.display_startup_errors 	        = 0
phpSettings.display_errors 			= 0
```


---


## Logo not appearing in PDFS ##

### Solution ###

If your logo is not displaying on the PDF of the invoice but is displaying OK on the print preview all you need to do is install PHP-GD. Thats the GD extension for PHP, make sure its enabled - check your phpinfo.php file and all should be fine

Thanks to JBHewitt on the forum for this one!!

If this doesn't fix the issue for you then you can add the below to options to the .htaccess file
```
php_value allow_url_fopen on
php_value allow_url_include 1
or add into your php.ini file

allow_url_fopen = on
allow_url_include  = 1
```

### Notes ###

  * refer: http://simpleinvoices.org/forum/discussion/883/logo-not-showing-in-pdf-invoice-issueopen/#Item_21
  * If your using 'localhost' and PDF is still not working try using the IP of your server instead of localhost
    * ie. http://yourIP/simpleinvoices instead of http://localhost/simpleinvoices
    * there can be issues with how your servers resolves localhost
  * refer: http://simpleinvoices.org/forum/discussion/comment/7952/#Comment_7952

### If you've got Apache authentication or a firewall configured ###

Your webserver needs to be able access your site - so if you have any firewall rules or Auth directives which might prevent localhost (or your webserver's public address) from accessing files, you will need to change them. For example, if you had set up Apache password protection for your site using AuthType Digest or AuthType Basic, you would need to add <b>Allow from</b> rules to let the server access the site without needing to authenticate itself:

```
		AuthType Digest
		AuthDigestProvider file
		AuthDigestDomain / http://your.simpleinvoices.tld/
		AuthUserFile /www/your.simpleinvoices.tld/.htdigest
	        Require valid-user

                Order Deny,Allow
                Deny From All
		Allow from 127.0.0.1
		Allow from 1.2.3.4 ### change this to your server's IP address
		Satisfy any
```


---


## Error 500 on initial install ##

Either:
  * delete the .htaccess file in the Simple Invoices folder
  * or enable mod\_rewrite in Apache


---


## TCPDF ERROR: [Image](Image.md) Unable to get image: ##

This is because TCPDF cannot write to the lib/tcpdf/cache folder.
Update the folder permissions to solve this problem.