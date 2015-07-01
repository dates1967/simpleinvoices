#summary Simple Invoices todo list :: all current issues and planned features

| **Wiki pages:** |[todo](todo.md) |[done](done.md) | [ideas](ideas.md)|
|:----------------|:---------------|:---------------|:-----------------|

--- next minor release ---

  * 2011.2
    * [issue 201](https://code.google.com/p/simpleinvoices/issues/detail?id=201)
    * ACH/PaymentsGateway.com code

--- Next major release ---

  * beta 1
    * review inv\_status - jk
    * review xml file for invoices ( customer login etc..) - jk
    * Review version control section - jk
    * There seems to be a duplicate entry in the si\_sql\_patchmanager table in /databases/mysql/Full\_Simple\_Invoices.sql at Line 733/734 - needs review JK
      * (556, 210, '', '', ''),
      * (557, 210, '', '', ''),
    * Create the correct JSON sql based on the new sql patches - and update the .sql files

  * beta 2
    * htmlsafe
      * edit biller - email address not happy
      * what about magic quotes
    * magic\_quotes option - if enabled stripslashes
    * Paypal link ? update refer reply from Tom [link](http://www.simpleinvoices.org/wiki/paypal)
    * Cron emails - only customer gets emails [link](http://simpleinvoices.org/forum/discussion/1292/simple-invoices-20102-beta-7-released/#Item_9)
    * Customer/user - currenlt if user email = customer email they are the same
      * change this - add a select customer to link the user to in the user add/edit page
      * in customer edit/view add tab for list of users
      * in customer add - have abiality to add a customer user
    * Create acl/permission for customer login

  * beta 3
    * add in timetracker    extension [link](http://www.simpleinvoices.org/forum/discussion/1577//#Item_1)
    * Adjust Tax Total re statuses [link](http://simpleinvoices.org/forum/discussion/1352/reports-not-working-100-query-errors/#Item_1)
    * fix up inventory qty re statues
    * 0 size PDFs when being emaield - when file name character accented

  * beta 4
    * 1 being added to css url - review [link ](http://simpleinvoices.org/forum/discussion/1241/2010-beta-5)
    * Invoice Preference: Invoice detail line not displayed in the view page
    * DB adjustments for large data - indexes, adjsut si\_invoices etc..[link](http://simpleinvoices.org/forum/discussion/1304/is-simple-invoices-suitable-for-large-databases/#Item_1)
    * API - zend auth error [link](http://simpleinvoices.org/forum/discussion/1303/api-and-authentication/#Item_1)
    * Biller Sales by Customer - Totals [link](http://simpleinvoices.org/forum/discussion/1292/simple-invoices-20102-beta-7-released/#Item_4)

  * beta 5
    * 2 Decimal place product/tax can end up with 3 decimal place total - reveiw
    * Invoice blank re template = default issue [link](http://simpleinvoices.org/forum/discussion/848/pdfdoc-excel-coming-blank/#Item_9)
    * Investigate partially paid invoices causing problems in reports [link](http://simpleinvoices.org/forum/discussion/1431/reports-doing-odd-things-in-20102update/#Item_2)
    * Reports show si\_invoices.id instead of si\_invoices.index\_id [link](http://simpleinvoices.org/forum/discussion/comment/8072/#Comment_8072)
    * Email SSL zend issue [link](http://www.simpleinvoices.org/forum/discussion/1450//#Item_2)


  * plans
    * jquery error [link](http://i.imgur.com/JSnQc.jpg)
    * Invoice numbering - add some kind of valiadation so can't be duplicated [link](http://simpleinvoices.org/forum/discussion/1199/simple-invoices-20102-beta-4-released/#Item_7)
    * Make all words/strings translatable [link](http://simpleinvoices.org/forum/discussion/1335/strings-out-the-lang-file/#Item_0)
    * Rename 'Invoice Preferences' to Documents or doc type .. [link](http://simpleinvoices.org/forum/discussion/comment/8023/#Comment_8023)
    * language and locale pre invoice preference
    * locale select in defaults
    * Customer, User, Viewer etc.. user types with working ACL/permissions etc..
    * Add new kick ass PDF library -> http://code.google.com/p/wkhtmltopdf/
      * http://simpleinvoices.org/forum/discussion/1222/
    * Rename 'Invoices Preferences' to 'Doc Type'
    * locale + language + index\_group fix
    * edit invoice - adjust label
    * payments - adjust label
    * Remove old sql files [link](http://simpleinvoices.org/forum/discussion/856/many-errors-in-installation-solved/#Item_7)

  * really shoud
    * short wording in Quick View page [link](http://simpleinvoices.org/forum/discussion/1305/formatting-witl-long-words-in-italian/#Item_1)
    * custom fields - domain id - stuff - JK
    * make search in Manage pages work good for all pages

  * maybe
    * invoice edit - notes - if note empty then have closed if not empty then display for edit - work-in-progress
    * redo home page - Recent Activity and Quick Stats
    * Email - update send function - so if email is diff from biller don't show Biller Name [link](http://simpleinvoices.org/forum/discussion/904/changes-in-email-out-functions/#Item_1)
    * User add - only admin role available [link](http://simpleinvoices.org/forum/discussion/955/no-roles-available-just-admin/#Item_0)
    * PDF - minor edit to html2pdf [link](http://simpleinvoices.org/forum/discussion/846/errors-while-trying-to-export-to-pdf/#Item_14)
    * Delete invoice not working in svn trunk [link](http://code.google.com/p/simpleinvoices/issues/detail?id=135)


--- future releases ---

  * need to get done
    * Update UI of System Preferences
    * Adjust IVA amount % [link](http://simpleinvoices.org/forum/discussion/859/)
    * Strip special characters from invoice name when emailing [link](http://simpleinvoices.org/forum/discussion/866/email-sent-without-the-pdf/#Item_4)
    * If tmp/log not  write-able don't error - just no cache or logging [link](http://simpleinvoices.org/forum/discussion/978/installation-error/)
    * IE - Manage Payments doesnt work [object/#Item\_0 link](http://simpleinvoices.org/forum/discussion/985/display-is-null-or-not-an-)
    * SQL patch problem - payment types [link](http://simpleinvoices.org/forum/discussion/1056/payment-types-not-showing-up/#Comment_5796)
    * Konquerer issues [link](http://simpleinvoices.org/forum/discussion/1114/edit-field-not-working-cant-put-in-text/#Item_3)
    * Sales report - menu problem [link](http://code.google.com/p/simpleinvoices/issues/detail?id=136)
    * Adjust pdf function for config [link](http://simpleinvoices.org/forum/discussion/1121/cant-produce-pdf-in-letter-size/#Item_2)
    * Make reports 2 decimal places [link](http://simpleinvoices.org/forum/discussion/1333/) [link](http://simpleinvoices.org/forum/discussion/1387/decimals-in-report)
    * Automatic notifications for overdue invoices [link](http://code.google.com/p/simpleinvoices/issues/detail?id=172)

  * really should
    * Products - allow setting 2 or more default taxes pre product
    * user - if user disbaled - if login attempt - give nice message
    * Display amount of tax for each item on an invoice.
    * Apply payments independent of invoices [link](http://code.google.com/p/simpleinvoices/issues/detail?id=176)

  * maybe
    * move all configs (where possible) out of config.ini and into system\_defaults
    * move date popup to jquery UI
    * Reports - localise
    * Update UI of Manage Extensions

--- simpleinvoices.org issues ---

  * move http://simpleinvoices.org/roadmap/dreamtime into google wiki
  * [Update documentation to .htaccess - Allow Override](http://simpleinvoices.org/forum/discussion/1059/setting-user-permissions/#Item_4)