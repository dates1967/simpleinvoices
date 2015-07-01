# Invoice Templates & Styles #

Got a sweet invoice template you'd like to share with the Simple Invoices community?

  * If so just create a new wiki page here, give us some description of the template and upload the files
    * refer the Example template page below for how to create a page and the how to create a template page on the wiki page for more info

  * Invoice templates define what and how information will be shown on the invoice
  * Invoice styles define how the invoice will look, these are alternate css styles that can be used with any of the templates




# Available templates #

  1. Euro template
> > This is the default template modified to have the currency symbol after the amount, and the correct format numbers for Euros –> ie. 2.132,45 €. Moreover there is some alignment corrections in the table of products.
> > http://simpleinvoices.googlecode.com/svn/templates/euro_template.tpl
  1. Template - No labels
> > This is a reworking of the original template with a few extras: Paid Stamp, PayPal link, No labels
> > http://www.simpleinvoices.org/wiki/template_-_no_labels
  1. Template - Grey Separators - Layout Change
> > This is a modification of the original template. I Moved sections around a bit, changed some font sizes, and added a background color to the section separatros.
> > http://simpleinvoices.googlecode.com/svn/templates/gray_separators.tpl
  1. Template - with 'ship to' fields
> > This is an improved version of the original template. I created the 'ship to' section ( needed in some cases) using the custom fields. By courtesy of Binary Networks SAS - Colombia.
> > http://simpleinvoices.googlecode.com/svn/templates/with_shipto.tpl

Available styles

  1. CSS Style 1
> > Original CSS template with some modifications. CSS style black and white with horizontal lines.
> > http://simpleinvoices.googlecode.com/svn/templates/css_rules.tpl


# New invoice/export Template #
To create a new invoice/export template the easiest way is to copy one of the subfolders of /templates/invoices/ (for example default) and edit it. Rename the folder and don't use special chars like öéä, spaces, etc.

Inside this folder is a file called template.tpl. It's the basic template file and will be read out automatically. So just modify this file to your needs.

The second file is called style.css. If you want to use css tags stored in an external file then you have to store it in style.css. To include it in your template.tpl file you have to add the following line (in the header if possible)



&lt;link rel="stylesheet" type="text/css" href="{$css}"&gt;



The variable $css automatically points to your style.css.

### Activating your template ###
Once you have created your new template, you can set it as the default template from Settings->System Preferences-[Edit](Edit.md)->Default Invoice Template.


### Enhanced templates ###
If you are an enhanced user and know smarty a bit I'm sure you know a bit about plugins. It's possible to write your own smarty-plugins for your invoice template. An example is shown in the default template. You have to place your plugins inside the folder /templates/invoices/yourinvoicetemplate/plugins/ so that they are read out correctly. You will find more about smarty plug-ins at this site: http://smarty.php.net/manual/en/plugins.php

### New Simpleinvoices Template ###
At the moment I don't advise changing the simpleinvoices templates (in the /templates/default folder).
To create a new one you can copy the folder default and make your changes in the new folder. So you don't have to modify the default template. Then open the file index.php and edit all lines with ../templates/default/ to ../templates/yourname/. This should work, but isn't tested. In later stage, there should be a possibilty to change the simpleinvoices templates like the invoices templates.