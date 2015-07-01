# Requirements #

To run Simple Invoices on your server or computer there are a number of applications that need to be installed.

If you don't have a server please refer to the market place for a list of Simple Invoices service providers who can provide you with Simple Invoices hosting - think google apps but for invoicing


---


## Required ##

  * Apache (Web server)
  * MySQL (Database server)
  * PHP 5 (Programming language)
    * For PDF export to work your PHP needs:
      * GD2 support
      * php.ini needs to be edited with a max memory of 24M
    * For Reports to work your PHP needs:
      * xsl support (in PHP5)
  * The tmp/ directory in the Simple Invoices folder must be writeable by the webserver user (ie chown apache:apache cache)
  * To send emails you will need access to a mail server (smtp)


---


## Recommended ##

  * phpMyAdmin http://phpmyadmin.sf.net


---


## Installation ##

For detailed instructions on how to install Simple Invoices please refer to the install page