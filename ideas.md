| **Wiki pages:** |[todo](todo.md) |[done](done.md) | [ideas](ideas.md)| [known\_issues](known_issues.md) |
|:----------------|:---------------|:---------------|:-----------------|:---------------------------------|

_Disclaimer: if its in the list it may get done sometime in the future if and when someone feels like it_
  * API
    * Create an API to handle
      * Add customer
      * Add product
      * Add biller
      * Add invoice
      * get PDF

  * test section

  * Backup
    * backups sent via email : http://simpleinvoices.org/forum/discussion/1037/database-backup-sent-via-email-or-at-least-downloadable/#Item_0
    * backup to a web directory is not really a good idea. Perhaps the download solution is a better one:
      * just mod the existing backup script to dump to screen or download file - same as how phpmyadmin dumps to screeen - in a text box
      * mod headers as in your example
```
		<?php
		include('config.php');

		$conn = mysql_connect( $host, $user, $password );
		mysql_select_db( $database, $conn );
		$name = date("ymd")."_tillbackup.sql";
		$backupFile = "/tmp/{$name}";

		system("/sw/bin/mysqldump --user=$user --pass=$password $database > $backupFile");

		header("Content-disposition: attachment; filename=$name");
		header("Content-type: unknown/unknown");

		include($backupFile);

		unlink($backupFile);
		?>
```


  * Code
    * Simple Invoices Errors - make look all pretty
    * apply aplysia new drop down list code to others (refer system default: biller)
    * index.php review input if is safe enought


  * Config
    * [Set number of rows in the manage grids as a config option](http://simpleinvoices.org/forum/discussion/928/number-of-invoices-on-one-page/#Item_1)
    * preferences: move rest into db

  * Custom fields
    * Make custom\_fields dynamic with the following tables
```
	customFieldsCategorie
	id,name (product,customer,biller,...)
	
	customFields
	id,categorieId,itemId,value

	customFieldsValues
	id,cateogireId,customFieldId,itemId,value

	customFieldType (can be added as plugin or so...)
	id, name, 
```
    * defining for every module an id?
    * customFieldPlugin Id's have to be unique. 0 - 100 for shipping plugins. Other numbers can be choosen with attention (public list?)

  * Customers
    * Change default tab in Customer View to be invoice listing rather than custom fields [link](http://simpleinvoices.org/forum/discussion/1356/sugestion-change-customer-invoice-listing-tab-position/#Item_0)

  * Delete
    * if delete is enabled allow delete for ALL items - products, billers, etc.. all with their relevant rules ie. if product has been included in an invoice then CAN'T delete etc..

  * Email
    * email : html and no html option - maybe??
    * email: add default signature - maybe - set in biller details ??
    * use utf-8 for e-mail sending - check this - AP
    * [Reminder emails for unpaid invoices (cron-script)](http://simpleinvoices.org/forum/discussion/908/reminders-for-open-invoices-help-wanted/#Item_14)
    * If fail to send add error messages etc..
    * Add to invoice history that it has been emailed
    * Ability to set default email text

  * Extensions
    * Make manage extensions UI better
      * remove Unregister from the core extension
    * Fix menu issue
    * Add field to extension info file to say which version works with [link](http://simpleinvoices.org/forum/discussion/1342/cleaning-si/#Item_1)

  * HTML
    * Convert all inline javascript >2 lines into files.
    * minify and gzip js&css.
    * Try merge js into one file.
      * With JS stuff just make sure the original - unminified javascript still lives somewhere in svn and that there are instructions to redo the minification

  * Installer
    * [Add system requirements checler - inc PHP-GD etc.. ](http://simpleinvoices.org/forum/discussion/883/logo-not-showing-in-pdf-invoice-issueopen/#Item_21)

  * Inventory
    * Disallow sale of product with 0 or less qty in stock
    * Draft invoices should not affect qty - this query needs to be updated [link](http://code.google.com/p/simpleinvoices/source/browse/trunk/sys/include/class/product.php#89)

  * Invoice
    * Invoice - New: Add customers/billers/products on the fly while creating a new invoice - via light box window
    * Invoice history - ie. Invoice 5 was first Quote 5, then changed, then emailed, then paid etc..
    * Address fields in invoice templates - include comma after add 1 or 2 if other address field not null
    * Invoice printing: What happens if a page is longer then 1 page for printing? (header,footer?)
    * Quick view - Note section: show the first 25 characters then follow with ... in the Hide View and full note in Show View
    * [Next/Prev in Quick View of invoice](http://simpleinvoices.org/forum/discussion/977/invoice-quick-view-next-and-prev-navigation/#Item_1)
    * [ability to move invoice items around in new and edit screen](http://simpleinvoices.org/forum/discussion/1090/feature-request-ability-to-insert-rows-between-already-created-rows/#Item_0)
    * [Copy/Clone invoice feature](http://simpleinvoices.org/forum/discussion/1202/invoice-copy-feature/#Item_1)
    * [Add total $ for all invoices in the Manage Invoices page](http://simpleinvoices.org/forum/discussion/1206/add-sum-total-at-the-bottom-of-the-invoice-list/#Comment_6528)
    * Pre tax discount /Cumulative CA/Quebec tax calc [link](http://simpleinvoices.org/forum/discussion/1013/pretax-discounts-as-an-extension-perhaps/#Item_17)
    * Multi select export [link](http://www.simpleinvoices.org/forum/discussion/1529//p1)

  * Manage Invoices
    * Add search to top of Manage Invoices grid [link](http://simpleinvoices.org/forum/discussion/1564)
    * Add preference to filter by default on X [link](http://simpleinvoices.org/forum/discussion/1564)

  * Localise
    * choose automatic language (need to rename language files/subfolder). We should use this standards (first we can start with only 2 chars variant)
      * http://www.rfc-editor.org/rfc/rfc4646.txt
      * http://www.iana.org/assignments/language-subtag-registry
        * use in the installer and i'll think about it for the login page when/if i add a lang drop down box there
    * Localise - look into Zend Locale or similar to handle localising all the formatting of dates, currency etc.
    * Add select language drop down box on login screen [in svn](implemented.md)
    * Localise all the javascript files    [link](http://simpleinvoices.org/forum/discussion/1385/localisation-one-more-change-to-do/#Item_0)

  * Login/Users/ACL
    * Customer Login
    * Biller login
    * users/groups/domains - make this happen!

  * Payments
    * Payments - nice print view ( or easy way to print receipt of current invoice)
    * Customer payments - accept via Paypal etc..
    * Eway
      * Add support for partial payments
    * [Auto email receipt on payment](http://simpleinvoices.org/forum/discussion/1195/automatic-emailing-of-receipts/#Item_0)
    * [PDF payment](http://simpleinvoices.org/forum/discussion/1246/pdf-for-receipts/#Comment_6809)


  * Products
    * ~~Product Cost field - http://simpleinvoices.org/forum/discussion/687/product-cost-price-field~~ implemented
    * Add Product full desctipion - this will auto populate teh item details section in new invioce refer http://simpleinvoices.org/forum/discussion/1191/description-of-product/#Item_1

  * Reports
    * Date based reports : http://simpleinvoices.org/forum/topic-391.html ( payments received today, invoices made today etc..) - AP
    * Customer : Statement of Accounts : http://simpleinvoices.org/forum/topic-414.html - AP
    * blow up phpreports and implement our own reporting tools
    * reports : add export to .xls format
    * Add total tax to the 'Monthly Sales and Payments per year' report

  * Statements
    * Add option to select only 'real'/non-draft invoices [link](http://simpleinvoices.org/forum/discussion/1352/reports-not-working-100-query-errors/#Item_1)

  * Translation
    * Add new translation for Paid filter and Paid amount [link](http://simpleinvoices.org/forum/discussion/1543/p/#Item_1)

  * Validation:
    * Add validation to the edit screen
    * make a proper validation function/class
    * Product Add - add validation on price