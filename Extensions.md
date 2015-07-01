# Extensions #

Table of Contents



---

# How extensions work #

index.php is the main file in Simple Invoices that does all the work to say what files are to be loaded when and what to present on screen

  * normally based on the url ie. index.php?module=invoices&view=manage

In the above example url index.php would load the relevant files to show the Manage Invoices page

  * it would load all the normal stuff to run Simple Invoices
  * then the php code for this page from ./modules/invoices/manage.php would be loaded
  * then it would load the template for this page from ./templates/default/invoices/manage.tpl
  * and then present a combination of the above file to the browser

The extension system provide a way to override and/or extended what is loaded via index.php

In index.php there are checks at each main include section to see if an extension has been enabled and if it has either include the extensions version of the requested file instead of the normal file or include it inconjunction with the normal file

For an extension to be included correctly the same directory structure for the normal file must be repeated in the extensions directory (ie. ./extensions/gene/modules/invoices/itemised.php would replace the normal file ./modules/invoices/itemised.php if the Gene extension was enabled)

To explain how it works i'll use a quick example from the Gene extension

  * What was required:
    * A customisation of the New Itemised invoice page with additional fields to be available
  * New fields meant that the function that inserts the products into the invoice items table will have to be altered
    * The normal function for this is stored in ./includes/sql\_queries.php
    * index.php includes the extensions version of sql\_queries.php, ./extensions/gene/include/sql\_queries.php along with the normal ./includes/sql\_queries.php
    * only the new functions/classes were placed in ./extensions/gene/include/sql\_queries.php all the normal functions stayed unedited in ./include/sql\_queries.php

  * The logic of the itemised screen has to be altered
    * By including the file ./extensions/gene/module/invoices/itemised.php it overwrote the default itemised.php file (./modules/invoices/itemised.php)

  * A custom view of the New Itemised invoice page was required
    * By including the file ./extensions/gene/templates/default/invoices/itemised.tpl it overwrote the default itemised.tpl file (./modules/invoices/itemised.tpl)

With these new files loaded a custom version of the Itemised invoices page was displayed and developed in a way to complement Simple Invoices

# How to enable an extension #

In the current version 2010.x, Extensions can be enabled / disabled by Registering / Unregistering at: Settings → Extensions and clicking on the first green icon on the left of ech extension entry.

---

# Extension Directory #
## Expense Extension ##

### About ###

This extensions provides Simple Invoices with expense features

Note:

The main purpose of this extension is for reporting
You can assign an expense to a biller, customer, invoice or product - but this is for reporting purposes only, you can't add an expense to an invoice and have that expense added to the total etc..

### Install ###

This extension is available in svn (as at 2009/08/08) and will be included in 2009.1 release. To enable this extension download the release with this extension then go to 'Settings' tab and select 'Settings'. In this page select 'Extensions' and then click the 'Register” link next to the Expenses extension and clic. Once registered just click the 'Enable' link next to Expenses in the list of extensions.

Once the extension has been enabled please run the below sql in your Simple Invoices database to create the required tables

### SQL ###

To enable the extension - only run if you don't activate the extension via the GUI
```
 INSERT INTO si_extensions VALUES ('2','1','expense','expense','1');
To create the tables

CREATE TABLE  `si_expense` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`amount` DECIMAL(25,6) NOT NULL ,
`domain_id` INT( 11 ) NOT NULL ,
`expense_account_id` INT( 11 ) NOT NULL ,
`biller_id` INT( 11 ) NOT NULL ,
`customer_id` INT( 11 ) NOT NULL ,
`invoice_id` INT( 11 ) NOT NULL ,
`product_id` INT( 11 ) NOT NULL ,
`date` DATE NOT NULL ,
`note` TEXT NOT NULL ,
`status` INT(1) NOT NULL 
) ENGINE = INNODB ;
 
CREATE TABLE  `si_expense_account` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`domain_id` INT( 11 ) NOT NULL ,
`name` VARCHAR( 255 ) NOT NULL
) ENGINE = INNODB;
 
INSERT INTO `si_expense_account` (`id`, `domain_id`, `name`) VALUES (NULL, '1', 'Car expense'), (NULL, '1', 'IT costs');
 
CREATE TABLE `si_expense_item_tax` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
`expense_id` INT( 11 ) NOT NULL ,
`tax_id` INT( 11 ) NOT NULL ,
`tax_type` VARCHAR( 1 ) NOT NULL ,
`tax_rate` DECIMAL( 25, 6 ) NOT NULL ,
`tax_amount` DECIMAL( 25, 2 ) NOT NULL ,
PRIMARY KEY ( `id` )
) ENGINE = MYISAM ;
```

### Who ###

This extension was developed by Justin Kelly of SixHQ for Carlos of Maximum Consult

### License ###

This extension is released under the GNU GPL 3


---


## Gene Extensions ##

### About ###

This extension provides Purchase Order abilities in Simple Invoices to suit the requested workflow

### Main features ###

Ability to adjust the the price and cost of a product during invoice creation/editing
some funky ajax to load the cost/price into editable input box per line item based on drop down list product selection
etc.. (Justin to write more stuff here)

### Status ###

This extension is currently work in progress

### SQL ###

There are modifications required to the Simple Invoices database for this extension to work

They are detailed in ./extensions/gene/install/sql.php

### Config ###

You need to edit ./config/config.php and enable the gene extension, refer how\_to\_enable\_an\_extension for how to do this


### Simple Invoices settings ###

#### Invoice Preference ####

Invoice preference with the ID of 5 (which by default is Quotes) to be edited to be the Purchase Order invoice preference

When you create a new Invoice it will default to Invoice Preference of ID = 1

When you create a new Purchase Order it will default to Invoice Preference of ID = 5

this is required so various pages display the correctly setting for POs and Invoices

#### Products ####

Edit the products in your database to include a Unit Cost, if you don;t when you create a new PO and select a product nothing will auto populate in the unit cost box

#### Custom Fields ####

#### Invoices ####

Edit Custom Fields and set the custom field 1 for Invoices to be Shipping. This stores the shiping cost in the si\_invoices table against the invoice and is used to calc the loaded unit cost (si\_invoice\_items.unit\_load\_cost)

Edit Custom Fields and set the custom field 1 for Invoices to be PO Received.

#### Customers ####

Edit Custom Fields and set the custom field 1 for Customers to be 'Customer or Vendor'.

#### General ####

This is only available in the nextrelease branch in svn as at 25th March 2008

### Who ###

This extension was developed by Justin Kelly of SixHQ for Gene from UDS

### License ###

This extension is released under the GNU GPL v3


---


## Schools Extension ##

### About ###

This extensions provides Simple Invoices with School Management features

### Status ###

This extension is currently work in progress

### SQL ###

There will be modifications required to the Simple Invoices database for this extension to work

They are detailed in ./extensions/school/install/sql.php

### Config ###

You need to edit ./config/config.php and enable the school extension, refer how\_to\_enable\_an\_extension for how to do this

### General ###

This extension is only available via SVN in the ./branches/nextrelease branch as at 25th March 2008

### Who ###

This extension was developed by Justin Kelly of SixHQ for Evgeny of Krasnodar School

### License ###

This extension is released under the GNU GPL 3


---


## Product Matrix Extension ##

### About ###

This extension provides a product matrix for Simple Invoices. This means that in invoice creation you can selcet a product and then a list of attributes and values will be display that are relavent to that product for you to choose from

ie. - Product = T-Shirt - Product Attributes = Size, Colour - Product Values = Size (Small, Medium, Large), Colour (Red, White, Blue)

In the Manage Product Values screen you can add new values and assign then to certain attributes, and in edit/add products you can assign attributes to a certain product

### Status ###

This extension is currently work in progress

### SQL ###

There are modifications required to the Simple Invoices database for this extension to work

They are detailed in ./extensions/product\_matrix/install/matrix.sql

You can just import this .sql file into phpMyAdmin for the db changes to be applied

### Config ###

You need to edit ./config/config.php and enable the product matrix extension, refer how\_to\_enable\_an\_extension for how to do this

### Simple Invoices settings ###

#### Product Attributes ####

Product attributes are the group of values that a product can have ie for the product 'T-shirt' it may have product attributes of size and colour

#### Product Values ####

Product values is the assigning of multiple values to a product attribute ie for the product 'T-shirt' with product attributes of size it may have product values of Small, Medium, and Large

### Who ###

This extension was developed by Justin Kelly of SixHQ

### License ###

This extension is released under the GNU GPL v3


---


## Text UI Extension ##

### About ###

This extension makes it possible to use Simple Invoices on a small phone with internet browser - ie. HTC Touch - (ie. phones smaller tahn the iphone)


### Main features ###

Stripped down UI of Simple Invoices to only include features that are absolutely necessary and also to fit on a small mobile phone screen
Manage pages rewritten to work on small screen

### Status ###

This extension is currently work in progress

### Notes ###

This extension has been designed to work with the product\_matrix extension
This extension is designed to be used with 2 installs (1 with this extension enabled and 1 without)
this is so that all the setup and more specific config stuff can be done using the normal UI on a PC and the text\_ui version just for the mobile version

### Config ###

You need to edit ./config/config.php and enable the text\_ui extension, refer how\_to\_enable\_an\_extension for how to do this

### Who ###

This extension was developed by Justin Kelly of SixHQ

### License ###

This extension is released under the GNU GPL v3


---


## Product Group Extension ##

### About ###

This extension provides adds a grouping into products. The main aims is to group line items in the invoice via these groupings

Note: tax rates per line item was developed for this extension - so thanks to Bernardo for funding this.

### Status ###

This extension is designed for Simple Invoices 2009.1

### Notes ###

Edit ./extensions/invoice\_grouped/include/init.php to list the groups you want
Set Product.Custom\_field1 to be grouping
Copy the invoice template folder from within ./extras/invoice\_group to ./templates/invoices/

### Config ###

You need to edit ./config/config.ini and enable the product matrix extension, refer how\_to\_enable\_an\_extension for how to do this

### Who ###

This extension was developed by Justin Kelly of SixHQ

### License ###

This extension is released under the GNU GPL v3


---


## Default Invoice Extension ##

### About ###

This extension allows you to create new invoices, based on an existing one.

### Details ###

When this extension is enabled, the following happens:

In the Manage Customers, the last invoice of each customer is shown (in an extra column). In the Manage Customers page, the action 'Add invoice' is available.

When Add invoice is clicked, the new invoice (itemised style) is created as normal, but then prefilled with the contents of the template invoice. Recurring invoices are made easy, though still manual. The only items not from the template are the invoice date and the invoice number.

The invoice is added once the 'save' button is hit.

By default, the template invoice number is stored in custom userfield customer\_cf4

### Author ###

Marcel van Dorp


---


# Modifications #

Modifications are unintegrated customisations to Simple Invoices

Note: it is preferable if you create an extension rather then a modification, modification where how we used to do stuff prior to the new Simple Invoices extensions system existing

This is the place to detail any add-on or modification your made to your own version of Simple Invoices that the rest of the Simple Invoices community can benefit from


---


## Custom Numbering ##

When I saw invoice numbering i have on mind, this isnt good for my. But I have solution for users with <10000 invoices maybe more. open: include/sql\_queries.php and paste this code on the end:
```
function lastInvoiceYearItem($type_id="2",$format="y",$inv_length="3") {
$year_newid = $type_id.date($format).sprintf("%0".$inv_length."d","0");
$sql = "SELECT count(`date`) AS count FROM `".TB_PREFIX."invoices` WHERE YEAR(`date`) = YEAR(CURDATE()) AND `type_id` = '".$type_id."'";
$lastinyear = dbQuery($sql);
$lastinyear_num = $lastinyear->fetch();
$year_id = $lastinyear_num["count"]+1;
$year_newid = $type_id.date($format).sprintf("%0".$inv_length."d",$year_id);
return $year_newid;
}
```
Go to line: 1914 and comment the line, next add this:
```
':index_id', lastInvoiceYearItem(), //':index_id',
index::next('invoice',$pref_group[index_group]),
after // is commented line
```
This is all, you can format your invoice numbering. But type ID its in this case only 2, bug is reported!


---


## Smart Invoice Numbering ##

### Description ###

I wanted to output my invoice numbers into this form: 000022, 000023, etc… I decided to do this with a Smarty plugin, so that I wouldn't have to change any of the core code, only my invoice templates.

### Installation ###

Upload the PHP file function.invoice\_number.php inside the plug-in folder: /simpleinvoices/include/smarty\_plugins/ to enable the plugin for all Simple Invoices' template files (all templates inside /simpleinvoices/templates/default).

You're not ready yet. The invoice templates (/templates/invoices/) won't load the plug-in. So, you also need to upload the file function.invoice\_number.php into this folder: /templates/invoices/{yourinvoicetemplate}/plugins/.

Now the plug-in is automatically loaded and usable.

### Download ###

You can download the zip file [here](http://www.gelderblomwebdesign.nl/public/simpleinvoices/smarty_invoice_number.zip).
- or refer the below Code section

### Examples ###

#### Basic usage ####

In most templates, the invoice number is printed with this code:
```
{$invoice.id}
```
Change it to this form:
```
{invoice_number invoiceId=$invoice.id}
```
This will invoke the Smarty function that adds the 0's, so that the invoice number is exactly 0 characters long, eg: 000022.

#### Specify the length ####

If you want to specify the length of your invoice number (default is 6), you can easily change this. Just add the parameter length=8, or any other length, to the smarty code. For example:
```
{invoiceNumber invoiceId=$invoice.id length=8}
```

### Author and copyright ###

This code is donated to the Simple Invoices community and is therefor part of the Simple Invoices project and freely usable (philosophy).

The original author is Gelderblom Webdesign, a Dutch webdesign company.

### Code ###

File: function.invoice\_number.php
```
<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 * @author Gelderblom Webdesign, www.gelderblomwebdesign.nl
 */
 
/**
 * Invoice number plugin
 * 
 * @param mixed $params Array with 'invoiceId' and 'length'. Length will be defaulted to 6, if not set.
 * @param Object $smarty
 * @example {invoiceNumber invoiceId=$invoice.id length=8}
 */
function smarty_function_invoice_number($params, &$smarty)
{
	if(empty($params['length']))
	{
		$params['length'] = 6;
	}
	$comp = $params['length'] - strlen($params['invoiceId']);
	for($i = 1; $i <= $comp; $i++) echo '0';
	echo $params['invoiceId'];
}
?>
```


---


## Per operator invoice numbers ##

### Installation ###
#### Add si\_biller\_index table ####

Add a new table, si\_biller\_index, that is similar in function to si\_index, just with one index per operator:

```
CREATE TABLE IF NOT EXISTS `simple_invoices`.`si_biller_index` ( 
    `biller_id` INT(10) NOT NULL , 
    `invoice_number` INT(11) NOT NULL , 
    INDEX `fk_si_biller_index_1` (`biller_id` ASC) , 
    PRIMARY KEY (`biller_id`) , 
    CONSTRAINT `fk_si_biller_index_1` 
    FOREIGN KEY (`biller_id` ) REFERENCES `simple_invoices`.`si_biller` (`id` ) ON DELETE CASCADE ON UPDATE CASCADE
);
```

#### Change SQL to use the new table ####

Have si\_biller\_index updated in much the same way as for si\_index (in sql\_queries.php) when a new invoice is created and add a new column, invoice\_number, to si\_invoices where this per operator index is inserted.

#### Show invoice number in UI ####

Then make sure that the invoice\_number is shown in the manage view of the invoices module and also that it is used in the default template for printing.

### Code ###

Patch for this functionality (here in combination with [template\_for\_f60\_invoice\_form](http://www.simpleinvoices.org/wiki/template_for_f60_invoice_form)) can be found [here](http://www.simpleinvoices.org/_media/wiki/per-operator-invoice-number.tar.bz2?id=wiki%3Aper_operator_invoice_numbers&cache=cache).


---


## Customer login app ##

### Info ###

Countrygirl - from the Simple Invoices forum developed a 'customer login app' for Simple Invoices

refer below link for the forum post

http://simpleinvoices.org/forum/discussion/1150/customer-login-area-available-for-testing

### Setup ###

Download: [client\_area.zip](http://www.simpleinvoices.org/_media/wiki/client_area.zip?id=wiki%3Acustomer_login_app&cache=cache)

as listed in the setup.txt file

1. Run the following SQL commands in phpMyAdmin or insert the columns manually into the si\_customers database if you want them to appear in a specific place

ALTER TABLE `si_customers` ADD `username` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8\_unicode\_ci NULL DEFAULT NULL

ALTER TABLE `si_customers` ADD `password` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8\_unicode\_ci NULL DEFAULT NULL

ALTER TABLE `si_customers` ADD `usertype` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8\_unicode\_ci NULL DEFAULT NULL

2. Add to simpleinvoices/lang/en-gb/lang.php (these values are all in alphabetical order so you may want to keep them that way)

$LANG['password'] = “Password”;1 $LANG['username'] = “Username”;1 $LANG['usertype'] = “User Type”;//1

3. Save lang.php and reupload to simpleinvoices/lang/en-gb/

4. Put values in all of the new username, password and usertype fields in the si\_customers table usertype should be enterred as “user” without the quotes.

5. Open dbc.php folder and change the top two lines of code

$dbname = 'database\_name'; $link = mysql\_connect(“localhost”,”db\_username”,”db\_password”) or die(“Couldn't make connection.”);

change database\_name to your database name change db\_username to your database username change db\_password to your database password

6. Open myaccount.php and change email@domain.com on line 138 to the email address that you accept paypal payments through, you can also change currency\_code=USD to currency\_code=CAD if you want your funds in Canadian funds

7. Upload the client\_area to your web server, I do not have mine within the simple invoices folder, mine is separate. If you do yours the same way you should be able to get there by going to http://www.yourdomain.com/client_area

Note: In order to get the invoice view pdf symbol to work you need to go into the simpleinvoices application and export each invoice as a pdf. The pdf automatically wants to save in this format Invoice1.pdf, keep that format and save it, then upload the pdf to the invoices folder

Note: This is a very simple system and can be used temporarily until the simple invoices gang get's their customer login are up and running.

Note: My client area code is put into the template of my web site so it looks identical to the rest of my web site. You can wrap every one of these pages with your website code to make yours the same way, or you can just use it the way it is. If you do want to wrap it with your web site code I have marked in each page where to put the code with:

<!– This is where you put the html for the top portion of your web site –>

<!– This is where you put the html for the bottom portion of your web site –>