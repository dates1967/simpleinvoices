#summary Simple Invoices release notes
| **Wiki pages:** |[todo](todo.md) |[done](done.md) | [ideas](ideas.md)| [known\_issues](known_issues.md) | [notes](notes.md) |
|:----------------|:---------------|:---------------|:-----------------|:---------------------------------|:------------------|


# SVN Trunk #

## 201x.x (svn trunk) ##
  * remove 'Database Upgrade Manager' from System settings page
  * Escape as much SI data as possible: refer [Escaping](Escaping.md)
  * Dutch translation fixed up to work OK
  * Fixed up si\_user\_roles table has auto increment id of 6
  * add SI version number into GUI - probably in the sys setting  page[link](http://simpleinvoices.org/forum/discussion/1504/)
  * Biller logo uploader [link](http://simpleinvoices.org/forum/discussion/1354/upload-a-logo-file-the-code/#Item_13)

# 2011 series #

## 2011.1 ##
  * Fixed cron only runs 25 jobs at once issue [link](http://code.google.com/p/simpleinvoices/issues/detail?id=146)

# 2010 series #

## 2010.2 Update 1 ##
  * Fixed teh edit customer issue in 2010.2 Stable [link](http://simpleinvoices.org/forum/discussion/1375/editing-customers-sql-error/)

## 2010.2 Stable ##
  * Paypal support http://www.simpleinvoices.org/wiki/paypal
  * Recurring invoices http://www.simpleinvoices.org/wiki/recurrence
  * Added Inventory http://simpleinvoices.org/wiki/inventory
  * Eway support http://www.simpleinvoices.org/wiki/eway
  * Added invoice statements
  * Predefined filters added to the Manage Invoices pages http://simpleinvoices.org/wiki/filters
  * Process payments page redone
  * Installer update
  * XSS fixed and data escaping
  * Invoices can now have statuses http://simpleinvoices.org/wiki/status
  * Invoice numbering groups added - ie. multiple invoice numbering ranges http://simpleinvoices.org/wiki/invoice_numbering_groups
  * Zend Framework update

## 2010.2 Beta 8 ##
  * paypal button updated [link](http://simpleinvoices.org/forum/discussion/1295/paypal-button-issues/#Item_1)
  * .htaccess updated [link](http://simpleinvoices.org/forum/discussion/1296/htaccess-rewrite/#Item_1)
  * update customer credit card issue fixed
  * Quick View html/custom fields issue fixed

## 2010.2 Beta 7 ##
  * Issue with editing invoices in beta 6 fixed
  * Issue with custom fields in beta 6 fixed
  * Fixed biller sales report status issue [link](http://simpleinvoices.org/forum/discussion/1227/quote-statement-invoice/#Item_4)
  * Fixed paid invoices issue [link](http://simpleinvoices.org/forum/discussion/1248/bug-in-paid-invoices/#Item_3) - needs review
  * Fixed Paypal IPN issue fixed re invoice id

## 2010.2 Beta 6 ##
  * Process payment page redone - no more crappy autocomplete
  * Payments - updated to work with the new Invoice ID system
  * Product unit price fomatting update to fix that tax calculation issue with 3+ decimal place product prices
  * Updated French translation
  * Upgraded Zend Framework to 1.10.4
  * Add php logging option
  * Upgrade to the SQL Patch system
  * Minor Eway upgrade
  * Statement upgrade - date filter and logging issues
  * Inventory update
  * Installer updated - now works with different table prefixes
  * Installer json data and sql fiels updated
  * Fixed lots of XSS flaws. Pretty much all output/data is now escaped.
    * Refer http://code.google.com/p/simpleinvoices/wiki/Escaping for more info
  * Zend mail utf8 change [link](http://simpleinvoices.org/forum/discussion/1238/strange-chars-in-the-body-of-sent-email/#Item_2)
  * Fixed zeros dropped off numbers [link](http://simpleinvoices.org/forum/discussion/1160/simple-invoices-20102-beta-2-released/#Item_2)
  * Fixed line 155 & 156 in include/class/invoice.php repeated
  * Update Essential Data and Sample Data json import files

## 2010.2 Beta 5 ##
  * fixed IE manage payments problem
  * adjusted and fixed issue with login page
  * fixed custom\_field1 problem
  * fixed export to Word in quick view problem
  * fixed French translation so that the manage grids now work
  * fixed preferences status save problem
  * fixed issue with blank Simple Invoices - now warns if cache folder not writeable
  * change to config - just use config/custom.config.ini if you want a version of config.ini that is not in svn
  * fixed issue with rounding number with lots of decimal places in invoice creation/editing
  * fixed email as PDF invoice name/id

## 2010.2 Beta 4 ##
  * fixed preferences save problem with beta 3
  * fixed products save problem with beta 3
  * fixed email as PDF 0kb sized attachments issue
    * note: some more work on this re utf8 needs to be done
  * fixed issue with installer not importing the correct data in beta 3 which caused some issues re saving stuff
  * minor edit to paypal code to make
  * added indexes on a few fields in the database to speed up the manage payments page when has 100s of records

## 2010.2 Beta 3 ##
  * Added Inventory - refer http://simpleinvoices.org/wiki/inventory
  * fixed add user no role problem
  * fixed decimal place - missing zeros problem
  * fixed cron ACL issue
  * fixed expense extension/2010.2 issues

## 2010.2 Beta 2 ##
  * Fixed tax total and grouping on invoice print issue
  * Fixed issue with various 'manage pages grid not working
  * Fixed issue where blank screen presented if tmp dir not writeable

## 2010.2 Beta 1 ##
  * Added recurring invoices - refer http://simpleinvoices.org/wiki/recurrence
  * Added support for Paypal - http://simpleinvoices.org/wiki/paypal
  * Added support for Eway payment gateway - http://simpleinvoices.org/wiki/eway
  * Added invoice statements
  * Predefined filters added to the Manage Invoices pages -http://simpleinvoices.org/wiki/filters
  * Invoices can now have statuses - http://simpleinvoices.org/wiki/status
  * Invoice numbering groups added - ie. multiple invoice numbergin ranges - refer http://simpleinvoices.org/wiki/invoice_numbering_groups
  * Swap Gross for SubTotal - refer: http://simpleinvoices.org/forum/discussion/826/nett--tax-gross/#Item_1
  * [edit db class - only use mysql attr if available](http://simpleinvoices.org/forum/discussion/996/new-20101-install-phpmyadminphpinfo-work-fine-blank-index/#Item_9) - Fixed
  * [Manage Products not sorting - only by ID](http://simpleinvoices.org/forum/discussion/899/simple-invoices-20091-update-1-released/#Item_16) - Fixed
  * [Removed the ReadMe.html file](http://simpleinvoices.org/forum/discussion/856/many-errors-in-installation-solved/#Comment_5074)
  * Disabled Taxes are still displayed in new invoice creation - Fixed
  * [apply reports zeros fix - Done](http://simpleinvoices.org/forum/discussion/1097/too-many-zeros/#Item_0)
  * [Manage products now sorts by alpha by default](http://simpleinvoices.org/forum/discussion/681/quotation-system/#Item_9)
  * Reports sql errors fixed
    * [Total owed by customer in all reports is giving an sql query error pag](http://simpleinvoices.org/forum/discussion/877/simple-invoices-20091-released/#Item_10)
    * [Make all the reports work fine](http://simpleinvoices.org/forum/discussion/877/simple-invoices-20091-released/#Item_35)
    * [also review debtor owing by customer](http://simpleinvoices.org/forum/discussion/267/report-showing-incorrect-amount/#Item_16)
  * Upgrade to Zend 1.10
  * [Look at removing uft8\_enocde in manage grid](http://simpleinvoices.org/forum/discussion/981/solved-customer-name-has-wrong-charset/#Item_1) - Done

## 2010.1 ##
  * update Zend Framework to version 1.9.6
  * add set\_include\_path(get\_include\_path() . PATH\_SEPARATOR . "./include/"); into init.php
  * fix autoloader so works with ZF 1.9.6

# 2009.1 series #
## 2009.1 update 1 ##
  * DB uft change
  * [Rounding in invoices problem](http://simpleinvoices.org/forum/discussion/888/invoice-amount-differs-from-financial-status-total/#Item_1)
  * [Extensions - if login on problem fixed](http://simpleinvoices.org/forum/discussion/882/error-when-click-extensions-under-the-setting/#Item_2)
  * Expense extension - if login on problem fixed

## 2009.1 ##
  * Config file change
  * Minor adjustment to background colours
  * Help link in header now points to http://www.simpleinvoices.org/help
  * SQL file cleanup
  * [Missing images added in](http://simpleinvoices.org/forum/discussion/861/simple-invoices-20091-release-candidate-available/#Item_32)
  * Minor installer change
  * Link to install documentation added to installer pages
  * Database upgrade removed from Settings page as no longer required

## 2009.1 Release Candiate ##
  * Delete invoices - add delete line item taxes
  * Fix email problem in beta 5
  * Config.ini change - display errors now on by default
  * Expense extension added - refer: http://simpleinvoices.org/wiki/expense_extension

## 2009.1 BETA 5 ##
  * Basic installer added
  * Payments page updated
  * Merge docs.php into normal index.php
  * Input validation using http://www.position-relative.net/creation/formValidator/
  * User Add - fill in info from session
  * Sql patch to move all consluting invoices to itemised style
  * Total style invoices is now selectable

## 2009.1 BETA 4 ##
  * Simple Invoices now works with E\_STRICT error reporting (ie. the 'Manage' pages now work for E\_STRICT people)
  * sql port number added into config.ini
  * UI updates
  * First Run wizard - work started
  * Default landing page is Manage Invoices if there is already an invoice in the db
  * backup db - menu fix
  * customer view info tabs - redone in jquery UI
  * Extensions can now be managed within Simple Invoices and not in the config file - thanks Marcel
  * System defaults table updated to include both domain\_id and extension\_id fields - so can have different values for a default depending on extension or domain - thanks Marcel

## 2009.1 BETA 3 ##
  * sql patch 163 - tax conversion patch updated
  * email as pdf working now
  * email - now allow multiple email addresses in to or bcc and can be delimited via , or  ; - thanks stella
  * add system pref for number of taxes per line item - done
  * users table admin - done
  * UI updates

## 2009.1 BETA 2 ##
  * Zend Framework upgraded to version 1.7.2
  * monthly sales/payments per year report fixed not to repeat first year
  * quick view cleanup
  * cache move to tmp/cache
  * database\_backup move to tmp/database\_backup
  * Simple Invoices log file added - tmp/log/si.log
  * customer total calcs updated
  * Upgrade issue fixed - if auth on upgrade now works ok
  * Simplify invoice layout - remove item tax and item total - now shows: qty, item, unit\_cost, price
  * Tax rates can be % or $ figure based - ie can be used for Sales Tax (10%) or Postage ($10)
  * Multiple tax rates per line item now possible
  * New UI
  * Qty now trims zeros from decimal places - so no longer have 2 decimal places for Qty
  * Make buttons look pretty
  * Make fields look pretty
  * Fix problem with selecting language
  * Documentation - need to updat to change permmissions of config/config.ini to 640
  * set domain\_id in session
  * change Unit Price to Unit Cost - change gross to Price
  * si\_account\_payments: change all refer to si\_payment
  * si\_payment: add domain\_id into all queries
  * si\_tax: add domain\_id into all queries
  * si\_user: change all refer to si\_user
  * domain\_id sql patches - write an update table set domain\_id = 1 for all tables
  * Consulting style - if desciptoin null then don;t show Description heading thing on the invoice
  * language select now works again
  * http\_auth now working for PDf again
  * javascript logging added - set debug.level = All in config.ini and press F2 in invoice creation - add some new line items to see it in action
  * merge itemised and consulting invoice styles
  * menu - on page load issue - done - added to jquery.init.js - so should load firs
  * Invoice line item - Description issue - done
  * Biller - enabled/diabled not workign correctly - done
    * test all other enable/disable - done
  * domain\_id into custom\_fields tables - done
  * add new line items on the fly in invoice creation - done
  * updates Taxes - add % or $ option - done
  * Default tax per product - done
  * PDF - change system from requiring the url of the invoice - this should fix lots of peoples PDF problems
    * note: PDF in email is still a work-in-progress

## 2009.1 BETA 1 ##
  * Zend Local added
  * the old $date\_format variable has been removed
    * now using the Zend\_Date to auto print the date in the locale date format
    * note: default dates printed in the locales zend medium format
  * Turkish tranlsation added - thanks Don Camillo
  * Swedish translation added - Thanks Ivar Walfridson
  * Move to Flexigrid as the Simple Invoies grid of choice (www.webplicity.net/flexigrid/)
  * Replaced the html editor tiny\_mce with a modified version of jquery rte (http://batiste.dosimple.ch/blog/2007-09/)
  * Replaced modal/info window - from ajs to cluetip (http://plugins.learningjquery.com/cluetip/)
  * URL link - get ride of the type id of an invoice being required in the url link - AP
  * lang: add new lang variables into all files : grep LANG\_TODO - AP - done
  * def invoice template - mob phone not coming through - check all fields - AP
  * Spaces in Invoice Preference name creates PDF issue :http://simpleinvoices.org/forum/topic-384.html
  * move phpreports libs from ./modules/reports/.. to ./lib - AP
  * pdf: pdf of the default templated doesnt include some of the borders on the right sides - needs fixing
  * make $tb\_prefix a global constant to be accessible in all functions (without global) - now as define


# pre 2009.1 series #

Complete changelog refer: http://simpleinvoices.org/changelog

## DONE OLD STUFF ##
  * sql patch: reset default invoices template to default - Done
  * sql patch: change custom fields to 255 length - up from the current 50 - Done
  * sql patch: change sql\_patch field to 255 length - up from the current 50 - Done
  * fix the submenus - make placement work as normal - done
  * pdf: change the file name to a shorter one , invoice3.pdf instead of the current long one - done
  * sqlpatches - make sure this works - the latest patches don't seem happy - done
  * css: make calendar popup css work as before - done
  * Replace $LANG strings with array - done
  * Start page in IE going crazy again - check ie hacks file is loaded - done
  * CSS - in reports page not working good - refer previous release for what its supposed to do
    * lionel fixed
  * remove all reference to $wording\_for\_enabledField and change to $LANG.enabled or $LANG.disabled - done
  * lang file cleanup up - done
    * remove old $m- etc variables - done
    * move the $lang