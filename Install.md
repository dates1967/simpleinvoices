# Installing Simple Invoices #

---


## Requirements ##

Before you get started there are a few requirements, have a quick read of the below page
  * [System requirements](http://code.google.com/p/simpleinvoices/wiki/Requirements) page


---


## Installation ##

If you know what your doing re PHP/MySQL just follow the quick install guide, else read on below for the full details

Quick install guide:
  1. http://simpleinvoices.org Download] latest version from our home page
  1. Unzip to webserver
  1. Create a blank MySQL database
  1. Edit [[config|config/config.ini]] with db details
  1. Open Simple Invoices in your browser ( http://localhost/simpleinvoices ) and follow the installer


---


## Full details ##

  1. Now the required software has been installed and is running, download the latest Simple Invoices package from http://simpleinvoices.org#get
  1. Extract the contents of the simple\_invoices\_yyyy.version.zip to a simpleinvoices folder in your web servers document root (ie. /var/www in Debian)
  1. Create a simple\_invoices database on your database server. I recommend you use phpMyAdmin to create/manage your new database.
  1. Now the database has been setup and files have been 'installed' in the webservers document root, SimpleInvoice just need to have its [[config|configuration]] file edited and then its fine to use
  1. Open the Simple Invoices [[config|configuration]] file (which is [[config|config.ini]] in the config/ folder) up in
  1. Edit the file so that
    * 'database.params.host' equals the name of your database server (normally "localhost"),
    * 'database.params.dbname' to the name of the database (normally "simple\_invoices"),
    * 'database.params.username' to the database username for the database specified in $db\_name,
    * 'database.params.password' to the password of the database user
  1. Set the tmp directory as writeable. To do this cd to the Simple Invoices directory (cd /var/www/html/simpleinvoices) and chown the cache directory to the apache(web server) user (chown apache:apache cache) or if your lazy just chmod 777 the directory (chmod -Rv 777 tmp)
  1. Open up Simple Invoices in your web browser ie. ( http://localhost/simpleinvoices ) and follow the 3 step installer.
  1. Simple invoices has been installed


---


## Export to PDF ##

If creating PDF in Simple Invoices didn't 'Just Work' there are a couple of changes that need to be made on your system to enable Export to PDF

  * For 'Export to PDF' to work there are two modifcation that needs to be made to your system:
  * The first step is to ensure the pdf exports directory writeable by the webserver
    * To do this the cachce directory in your Simple Invoices folder must be writeable, in unix cd to the Simple Invoices 'tmp' directory (cd /var/www/html/simpleinvoices/tmp) and chown the cache directory to the apache (webserver user) (chown apache:apache cache), in windows just browse to the cache folder and make sure its writeable by all users.
    * We also need to make the pdf fonts directory writeable. To do this in unix chown the ./library/pdf/fpdf directory to the apache(web server) user (chmown apache:apache library/pdf/fpdf/), in windows just browse to the fdpf folder(in the pdf folder) and make sure its writeable by all users.
  * nce this cache folder has been made writeable the next step is to test if version of PHP has GD2 support
    * GD2 is an extension to PHP which enables PHP to create and manipulate image files in a variety of different image formats
    * To test if your version of PHP has GD2 support open up your internet browser and browse inside Siple Invoice folder to the phpinfo.php file (http://localhost/simpleinvoices/phpinfo.php)
    * Once phpinfo.php is open in your browser, scroll down to the 'gd' section and check the values for 'GD Support' and 'GD Version'. If all goes well you should see similar information to below
```
           gd
           GD Support 	enabled
           GD Version 	2.0 or higher
```
    * If your PHP doesnt have GD2 support enabled or doesnt have GD2 or above please refer to your operating systems PHP guide on how to enable this. In Debain/Ubuntu just install the php-gd package through 'Add Applications' to get gd support
  * Once you have confirmed your PHP has GD2 support we must test if your php.ini file needs to be altered to enable pdf creation
    * To test if you need to modify your php.ini file open your internet browser and go to your Simple Invoices directory ./library/pdf/ (http://localhost/simpleinvoices/library/pdf)
    * This page 'html2ps/pdf demo' is used to test if your system is capable of generating pdf files
    * The 'Source' area the 'Single URL' is set to www.google.com by default, if you are connected to the internet just leave this as is but if your currently not connected to the internet change this to a valid webpage on your system ie. http://localhost/simpleinvoices and scroll to the bottom of the page and click the 'Convert File' button
    * If all goes well a pdf of www.google.com homepage(or the valid url you entered) will be created and displayed in your pdf viewer
    * If a pdf wasn't created and the below error occurred this mean you will have to alter your php.ini file
```
           Fatal error: Allowed memory size of 8388608 bytes exhausted (tried to allocate 4864 bytes) 
           in /var/www/simpleinvoices/pdf/filter.data.html2xhtml.class.php on line 8
```
  * php.ini
    * If in the above procedure you found that a pdf cant be created and an 'Allowed memory size' error occurred you have to edit your php.ini
    * To find where your php.ini file is stored on the system browse again to tha phpinfo.php page (http://localhost/simpleinvoices/phpinfo.php) and note where the 'Configuration File (php.ini) Path' is referring to.
    * Open the php.ini file from the location referred in the previous step in your favourite text editor (notepad,vi,emacs,gedit...) and alter the specified 'memory\_limit' number
      * Find the line 'memory\_limit =' (refer below) and change this from the default 8M to 64M (more if your adventurous :) )

```
            ;;;;;;;;;;;;;;;;;;;
            ; Resource Limits ;
            ;;;;;;;;;;;;;;;;;;;

            max_execution_time = 90     ; Maximum execution time of each script, in seconds
            max_input_time = 60 ; Maximum amount of time each script may spend parsing request data
            memory_limit = 8M      ; Maximum amount of memory a script may consume (8MB)
```
  * Your altered php.ini file should now looking like below
```
            ;;;;;;;;;;;;;;;;;;;
            ; Resource Limits ;
            ;;;;;;;;;;;;;;;;;;;

            max_execution_time = 90     ; Maximum execution time of each script, in seconds
            max_input_time = 60 ; Maximum amount of time each script may spend parsing request data
            memory_limit = 64M      ; Maximum amount of memory a script may consume (8MB) 
```
  * For this change to come into affect you need to reload apache, in red hat based systems sudo /etc/init.d/httpd reload or in ubuntu/debian sudo /etc/init.d/apache2 reload. If your unsure of this step or your a windows users just restart your system and it'll be right.


---


## Final steps ##

  * Everything has been setup and configured now, Simple Invoice is ready to be used
  * Open your Internet browser and go to http://localhost/simpleinvoices and use Simple Invoices as you wish
  * Installation is finished


---


## Had problems with the Simple Invoices installer ? ##

If you had problems with the Simple Invoices installer you can manually import the full Simple Invoices database, just follow the below steps
  * Open phpMyAdmin
  * Browse to the Simple Invoices database
  * Select the 'Import' tab and import the file './databases/mysql/simpleinvoices\_full.sql' from your Simple Invoices directory
  * Open your Internet browser and go to http://localhost/simpleinvoices and use Simple Invoices as you wish


---


## More info ##
For more information on setup options please refer to the below links:
  * To enable login/authentication refer [[wiki:how\_do\_i\_enable\_authentification\_ie\_a\_login\_system\_in\_simple\_invoices]]
  * To upgrade Simple Invoices from one version to another refer [[wiki:upgrade]]


---


## Questions ##
  * If you have any questions, queries, ideas etc. re Simple Invoices you can post on our forum at:
    * http://simpleinvoices.org/forum