<?php

/*
* Script: latviesu_latvian.inc.php
* 	Latviesu valodas tulkojums
*
* Authors:
*	 Iveta N. Thetford
*
* Last edited:
*    2007-12-22
*
* License:
*	 GPL v2 or above
*/

/*// 1 means that the variable has been translated and // zero means it hasnt been translated - this is used by a script to calculate how much of each file has been done
regex :%s/;/ /1/;// 1\/\/1/g - remove the spaces
 */

#all
$title = "Simple Invoices";//0

$LANG['about'] = "Par mums";//1
$LANG['account_info'] = "Rēķina info";//1
$LANG['actions'] = "Darbība";//1
$LANG['add'] = "Add";//0
$LANG['add_biller'] = "Pievienot kreditoru";//1
$LANG['add_customer'] = "Pievienot klientu";//1
$LANG['add_invoice_item'] = "Add Invoice Item";//0
$LANG['add_invoice_preference'] = "Add Invoice Preference";//0
$LANG['add_item'] = "Pievienot ierakstu";//1
$LANG['add_new_biller'] = "Pievienot jaunu kreditoru";//1
$LANG['add_new_invoice'] = "Pievienot jaunu pavadzīmi";//1
$LANG['add_new_payment_type'] = "Pievienot jaunu maksājuma veidu";//1
$LANG['add_new_preference'] = "Add New Invoice Preference";//0
$LANG['add_new_product'] = "Pievienot jaunu produktu";//1
$LANG['add_new_tax_rate'] = "Pievienot jaunu nodokli";//1
$LANG['add_payment_type'] = "Pievienot maksājuma veidu";//1
$LANG['add_product'] = "Pievienot produktu";//1
$LANG['add_tax_rate'] = "Pievienot nodokli";//1
$LANG['address'] = "Adrese";//1
$LANG['address_city'] = "Adrese: pilsēta";//1
$LANG['address_country'] = "Adrese: valsts";//1
$LANG['address_state'] = "Adrese: rajons/novads";//1
$LANG['address_street'] = "Adrese: iela";//1
$LANG['address_zip'] = "Adrese: pasta kods";//1
$LANG['age'] = "Vecums";//1
$LANG['aging'] = "Novecojis";//0
$LANG['all_reports'] = "All reports";//0
$LANG['amount'] = "Summa";//1
$LANG['as_template'] = "as template";//0
$LANG['attention_short'] = "Uzm.";//0
$LANG['attribute'] = "Attribute";//0
$LANG['attribute_short'] = "Attr";//0
$LANG['back'] = "Back";//0
$LANG['backup_database'] = "Izveidot datu bāzes rezerves kopiju";//1
$LANG['biller'] = "Kreditors";//1
$LANG['biller_details'] = "Kreditora info";//1
$LANG['biller_edit'] = "Labot kreditoru";//1
$LANG['biller_id'] = "Kreditora ID";//1
$LANG['biller_name'] = "Kreditora vārds";//1
$LANG['biller_sales'] = "Biller Sales";//0
$LANG['biller_sales_by_customer_totals'] = "Biller Sales by Customer - Totals";//0
$LANG['biller_sales_total'] = "Biller Sales - Total";//0
$LANG['biller_to_add'] = "Pievienot kreditoru";//1
$LANG['billers'] = "Kreditori";//1
$LANG['cancel'] = "Atcelt";//1
$LANG['change_log'] = "Izmaiņu logs";//1
$LANG['city'] = "Pilsēta";//1
$LANG['consulting'] = "Konsultācijas";//1
$LANG['consulting_style'] = "Konsultācijas veidne";//1
$LANG['country'] = "Valsts";//1
$LANG['create_invoice'] ="Izveidot pavadzīmi";//1
$LANG['credits'] = "Kredīts";//1
$LANG['currency_sign'] = "Valūtas zīme";//1
$LANG['custom_field'] = "Custom field";//0
$LANG['Custom_Fields'] = "Custom Fields";//0
$LANG['custom_field_db_field_name'] = "Datubāzes laukuma nosaukums";//1
$LANG['custom_field1'] = "Custom field 1";//0
$LANG['custom_field2'] = "Custom field 2";//0
$LANG['custom_field3'] = "Custom field 3";//0
$LANG['custom_field4'] = "Custom field 4";//0
$LANG['custom_fields'] = "Custom fields";//0
$LANG['custom_fields_upper'] = "Custom Fields";//0
$LANG['custom_label'] = "Custom label";//0
$LANG['customer'] = "Klients";//1
$LANG['customer_account'] = "Klienta konts";//1
$LANG['customer_add'] = "Pievienot jaunu klientu";//1
$LANG['customer_contact'] = "Klienta kontaktpersona (Uzm.)";//1
$LANG['customer_details'] = "Klienta info";//1
$LANG['customer_edit'] = "Labot klientu";//1
$LANG['customer_id'] = "Klienta ID";//1
$LANG['customer_name'] = "Klienta vārds";//1
$LANG['customer_short'] = "Cust";//0
$LANG['customers'] = "Klienti";//1
$LANG['dashboard'] = "Dashboard";//0$LANG['database_log'] = "Database Log";//0
$LANG['database_upgrade_manager'] = "Database Upgrade Manager";//0
$LANG['date'] = "datums";//1
$LANG['date_created'] = "Datums kad izveidots";//1
$LANG['date_formatted'] = "Datums (YYYY-MM-DD)";//0
$LANG['date_upper'] = "Datums";//1
$LANG['days'] = "dienas";//1
$LANG['debtors'] = "Debitori";//1
$LANG['debtors_by_aging_periods'] = "Debtors by Aging periods";//0
$LANG['debtors_by_amount_owed'] = "Debtors by amount owed";//0
$LANG['default_biller'] = "Noklusētais kreditors";//1
$LANG['default_customer'] = "Noklusētais klients";//1
$LANG['default_inv_template'] = "Noklusētā pavadzīmes veidne";//1
$LANG['default_invoice_preference'] = "Default Invoice Preference";//0
$LANG['default_number_items'] = "Default number of line items";//0
$LANG['default_payment_type'] = "Noklusetais maksajuma veids";//1
$LANG['default_tax'] = "Noklusētais nodoklis";//1
$LANG['delete'] = "Izdzēst";//1
$LANG['denied_page'] = "You are not allowed to view this page";//0
$LANG['description'] = "Paskaidrojums";//1
$LANG['description_short'] = "Desc";//0
$LANG['details'] = "Papildus info";//1
$LANG['disabled'] = "Atslēgts";//1
$LANG['edit'] = "Labot";//1
$LANG['edit_view_tooltip'] = "Labot";//1
$LANG['email'] = "E-pasts";//1
$LANG['email_bcc'] = "Email BCC (Blind Carbon Copy)";//0
$LANG['email_from'] = "Email From";//0
$LANG['email_to'] = "Email To";//0
$LANG['email_quick'] = "Īsais e-pasts";//1
$LANG['enabled'] = "Iedarbinats";//1
$LANG['export_as'] = "Eksportēt kā";//1
$LANG['export_doc'] = "Export to DOC";//0
$LANG['export_doc_tooltip'] = "to a word processor as";//0
$LANG['export_pdf'] = "Eksportēt kā PDF";//1
$LANG['export_pdf_tooltip'] = "PDF formātā";//1
$LANG['export_tooltip'] = "Eksportēt";//1
$LANG['export_xls'] = "Export to XLS";//0
$LANG['export_xls_tooltip'] = "to a spreadsheet as";//0
$LANG['extensions'] = "Extensions";//0
$LANG['faqs'] = "Biežāk uzdotie jautājumi";//1
$LANG['faqs_how'] ="Kā izveidot pavadzīmi?";//1
$LANG['faqs_need'] ="Kas man ir vajadzīgs lai es varu izsūtīt pavadzīmi?";//1
$LANG['faqs_type'] ="Kāda veida pavadzīmes ir pieejamas?";//1
$LANG['faqs_what'] ="Kas ir Simple Invoices?";//1
$LANG['fax'] = "Fax";//1
$LANG['financial_status'] = "Financial status";//0
$LANG['format_tooltip'] = "formāts";//1
$LANG['for'] = "for";//0
$LANG['from'] = "From";//0
$LANG['fwrite_error'] = "Did you get fwrite errors?";//0
$LANG['get_help'] = "Palīdzība";//1
$LANG['getting_started'] ="Uzsākot darbu";//1
$LANG['gross_total'] = "Gross";//0
$LANG['help'] = "Palidzība";//1
$LANG['help_custom_fields'] = "This field is a 'Custom Field'. This means that the label can be defined as whatever you want (ie. Barcode, Tax number, MSN, etc...). <br /><br />To edit or view existing 'Custom Fields' please select the Custom Fields option from the Options menu.";//0
$LANG['help_email_to'] = "This field is a mandatory field and gets the default value from the Customers email address.  You can change this email address as you require<br /><br /><i>Note: You can add multiple email addresses here - just use either , or ; to split the addresses</i>";//0
$LANG['help_email_from'] = "This field is a mandatory field and gets the default value from the Billers email address.  You can change this email address as you require but cannot add more than 1 email address in this field<br /><br /><i>Note: There can be only 1 email address in this field</i>";//0
$LANG['help_email_bcc'] = "This field is not mandatory and gets the default value from the Billers email address. <br /><br />
Its recommended that you BCC yourself onto this email so that you also get a copy of it.  This way you know for sure that the email has been correctly sent and you always have a backup copy of the email.
<br /><br />
<i>Note: You can add multiple email addresses here - just use eith , or ; to split the addresses</i>
";//0
$LANG['help_email_cc'] = "This field is not mandatory.  Here you can specify any email address you want to CC but cannot add more than 1 email address in this field<br /><br />
<i><i>Note: You can add multiple email addresses here - just use eith , or ; to split the addresses</i></i>
";//0
$LANG['help_required_field'] = "This is a mandatory field.  You have to enter a value in this field before you can save the form<br /><br />";//0
$LANG['help_street2'] = "The field 'Street Address 2' is used when the street address for the biller or customer is either to long to fit one one line or contains multiple parts.<br /><br />
 ie. the street address 'Level 234, 325 South Malvern Road' can be seperated into <br />
<br />Street: Level 234
<br />Street Address 2: 325 South Malvern Road";//0
$LANG['help_insert_biller_text'] = "To select no logo please select '_default_blank_logo.png' from the list
  </p>
  <p>
	To add additional logos into Simple Invoices, copy the logo file into the logo directory in the Simple Invoices folder
";//0
$LANG['help_customer_contact'] = "The 'Attn.' or Customer Contact field allow you to specify a contact within your customers business.<br /><br />This is usefull if you customer has many employees and you need to directly specify on the invoice who within your customers business this invoice is for.<br /><br /> ie. Within the customer 'Springfield Power Plant'  you may want to specify Mr Burns (or Smithers) as the customer contact as they are the person who gets the invoice.<br /><br />

So an Invoice will look like <br />
<br />
Customer: Springfield Power Plant<br />
Attn.: Mr Burns<br />";//0
$LANG['help_invoice_custom_fields'] = "Need more fields in the invoice screen? Want your own fields like 'Purchase Order', 'Project name' etc..
<br /><br />
Simple Invoices allows you to add whatever fields you want into the invoices.  These are called 'custom fields', to edit or setup your own fields select Custom Fields from the Options menu.
";//0
$LANG['hide_details'] = "Noslēpt papildus info";//1
$LANG['home'] = "Sākums";//1
$LANG['id'] = "ID";//1
$LANG['ie_10_for_10'] = "* piem. 10 par 10%";//1
$LANG['included'] = "iekļauts";//1
$LANG['insert_biller'] = "Pievienot kreditoru";//1
$LANG['insert_customer'] = "Pievienot klientu";//1
$LANG['insert_payment_type'] = "Pievienot maksājuma veidu";//1
$LANG['insert_preference'] = "Insert Preference";//0
$LANG['insert_product'] = "Pievienot produktu";//1
$LANG['insert_tax_rate'] = "Pievienot nodokli";//1
$LANG['installation'] = "Instalācija";//1
$LANG['inv'] = "Pavadzīme";//1
$LANG['inv_consulting'] = " - Konsultācija";//1
$LANG['inv_itemised'] = " - Itemised";//0
$LANG['inv_pref'] = "Invoice Preference";//0
$LANG['inv_pref_short'] = "Pref";//0
$LANG['inv_total'] = " - Kopā";//1
$LANG['invoice'] = "Pavadzīme";//1
$LANG['invoice_create'] = "Invoice Create";//0
$LANG['invoice_detail_heading'] = "Invoice detail heading";//0
$LANG['invoice_detail_line'] = "Invoice detail line";//0
$LANG['invoice_footer'] = "Invoice footer";//0
$LANG['invoice_heading'] = "Invoice heading";//0
$LANG['invoice_id'] = "Pavadzīmes ID";//1
$LANG['invoice_listings'] = "Invoice listing";//0
$LANG['invoice_payment_line_1_name'] = "Invoice payment line 1 name";//0
$LANG['invoice_payment_line_1_value'] = "Invoice payment line 1 value";//0
$LANG['invoice_payment_line_2_name'] = "Invoice payment line 2 name";//0
$LANG['invoice_payment_line_2_value'] = "Invoice payment line 2 value";//0
$LANG['invoice_payment_method'] = "Pavadzīmes norēķina veids";//1
$LANG['invoice_preference_to_add'] = "Invoice preference to add";//0
$LANG['invoice_preferences'] = "Invoice Preferences";//0
$LANG['invoice_start'] = "Invoice Start";//0
$LANG['invoice_summary'] = "Invoice Summary";//0
$LANG['invoice_type'] = "Veids";//1
$LANG['invoice_wording'] = "Invoice wording";//0
$LANG['invoices'] = "Pavadzīmes";//1
$LANG['item'] = "Item";//0
$LANG['itemised'] = "Itemised";//0
$LANG['itemised_style'] = "Itemised style";//0
$LANG['language'] = "Valoda";//1
$LANG['license'] = "Licenze";//1
$LANG['logging'] = "Logging";//0
$LANG['login'] = "Autorizēties";//1
$LANG['logo_file'] = "Logo fails";//1
$LANG['Logo_File'] = "Logo File";//0
$LANG['logout'] = "Iziet";//1
$LANG['manage'] = "Pārvaldīt";//1
$LANG['manage_billers'] = "Pārvaldīt kreditorus";//1
$LANG['manage_custom_fields'] = "Manage Custom Fields";//0
$LANG['manage_customers'] = "Pārvaldīt klientus";//1
$LANG['manage_data'] ="Pārvaldīt savus datus";//1
$LANG['manage_existing_invoice'] ="Pārvaldīt savas esošās pavadzīmes";//1
$LANG['manage_invoice_preferences'] = "Manage Invoice Preferences";//0
$LANG['manage_invoices'] = "Pārvaldīt pavadzīmes";//1
$LANG['manage_payment_types'] = "Pārvaldīt norēķina veidus";//1
$LANG['manage_payments'] = "Pārvaldīt norēķinus";//1
$LANG['manage_preferences'] = "Manage Preferences";//0
$LANG['manage_products'] = "Pārvaldīt produktus";//1
$LANG['manage_tax_rates'] = "Pārvaldīt nodokļus";//1
$LANG['mandatory_fields'] = "All fields are mandatory";//0
$LANG['message'] = "Message";//0
$LANG['mobile_phone'] = "Mobīlais telefons";//1
$LANG['mobile_short'] = "Mob.";//1
$LANG['monthly_sales_per_year'] = "Monthly Sales and Payments per year";//0
$LANG['money'] = "Money";//0
$LANG['name'] = "Name";//0
$LANG['new_invoice'] = "New invoice";//0
$LANG['new_invoice_consulting'] = "Jauna pavadzīme - Konsultācija";//1
$LANG['new_invoice_itemised'] = "Jauna pavadzīme - Uzskaite";//1
$LANG['new_invoice_total'] = "Jauna pavadzīme - kopsumma";//1
$LANG['new_password'] = "New password";//0
$LANG['no_billers'] = "There have been no billers created. Click the 'Add New Biller' button above to create one";//0
$LANG['no_customers'] = "There have been no customers created.  Click the 'Add New Customer' buttom above to create one";//0
$LANG['no_defaults'] = "There are no defaults";//0
$LANG['no_invoices'] = "There have been no invoices created. Click the 'Add a new Invoice' button above to create an invoice";//0
$LANG['no_help_page'] = "There is no help page created for the requested topic";//0
$LANG['no_payment_types'] = "There have been no payment types created.  Click the 'Add New Payment Type' button above to create one";//0
$LANG['no_payments'] = "There are no payments recorded. Click the 'Process Payment' button above to enter a payment received";//0
$LANG['no_preferences'] = "There have been no invoice preferences created.  Click the 'Add Invoice Preference' button above to create one";//0
$LANG['no_products'] = "There have been no products created. Click the 'Add New Product' button above to create one";//0
$LANG['no_tax_rates'] = "There have been no tax rates created.  Click the 'Add New Tax Rate' button above to create one";//0
$LANG['no_users'] = "There have been no users created. Click the 'Add User' button above to create one";//0
$LANG['none'] = "none";//0
$LANG['note'] = "Papildus info";//1
$LANG['notes'] = "Papildus info";//1
$LANG['notes_opt'] = "Papildus info (neobligāts)";//1
$LANG['number_of_taxes_per_line_item'] = "Number of taxes per line item";//0
$LANG['number_short'] = "Nr.";//1
$LANG['optional'] = "neobligāts";//1
$LANG['options'] = "Neobligāts";//1
$LANG['Other'] = "Other";//0
$LANG['owing'] = "Parādā";//1
$LANG['paid'] = "Nomaksāts";//1
$LANG['password'] = "Password";//0
$LANG['payment_id'] = "Nomaksas ID";//1
$LANG['payment_type'] = "Nomaksas veids";//0
$LANG['payment_type_description'] = "Payment type description";//0
$LANG['payment_type_details'] = "Nomaksas veida info";//1
$LANG['payment_type_edit'] = "Labot nomaksas veidu";//1
$LANG['payment_type_id'] = "Nomaksas veida ID";//1
$LANG['payment_type_method'] = "Nomaksas veids/metode";//1
$LANG['payment_type_to_add'] = "Payment type to add";//0
$LANG['payment_types'] = "Nomaksas veidi";//1
$LANG['payments'] = "Nomaksas";//1
$LANG['payments_filtered'] = "Payments filtered by Invoice ID";//0
$LANG['payments_filtered_customer'] = "Payments filtered by customer";//0
$LANG['payments_filtered_invoice'] = "Process Payment for this Invoice";//0
$LANG['people'] = "People";//0
$LANG['phone'] = "Telefons";//1
$LANG['phone_short'] = "Ph.";//0
$LANG['preference'] = "preference";//0
$LANG['preference_id'] = "Preference ID";//0
$LANG['preferences'] = "Preferences";//0
$LANG['prepare_simple_invoices'] = "Prepare Simple Invoices for use";//0
$LANG['Price'] = "Price";//0
$LANG['print_preview'] = "Izdrukas apskats";//1
$LANG['print_preview_tooltip'] = "Print Preview of";//0
$LANG['process'] = "Process";//0
$LANG['process_payment'] = "Process Payment";//0
$LANG['process_payment_details'] = "Process Payment Details";//0
$LANG['process_payment_for'] = "Process Payment for";//0
$LANG['process_payment_inv_id'] = "Process Payment Invoice ID";//0
$LANG['process_payment_auto_amount'] = "Process Payment Auto Amount";//0
$LANG['product'] = "Prece";//1
$LANG['product_description'] = "Preces apraksts";//1
$LANG['product_edit'] = "Labot preci";//1
$LANG['product_enabled'] = "Product Enabled";//0
$LANG['product_id'] = "Preces ID";//1
$LANG['product_sales'] = "Product Sales";//0
$LANG['product_to_add'] = "Pievienot preci";//1
$LANG['product_unit_price'] = "Product Unit Price";//0
$LANG['products'] = "Preces";//1
$LANG['products_by_customer'] = "Products by Customer";//0
$LANG['products_sold_customer_total'] = "Products sold - Customer - Total";//0
$LANG['products_sold_total'] = "Products Sold - total";//0
$LANG['provision_of'] = "Provision of";//0
$LANG['quantity'] = "Daudzums";//1
$LANG['quantity_short'] = "Sk.";//1
$LANG['quick_view'] = "Quick View";//0
$LANG['quick_view_of'] = "This is a Quick View of";//0
$LANG['quick_view_tooltip'] = "Quick View of";//0
$LANG['rate'] = "Rate";//0
$LANG['reports'] = "Reports";//0
$LANG['Required_Field'] = "Required Field";//0
$LANG['role'] = "Role";//0
$LANG['sales'] = "Sales";//0
$LANG['sales_by_customers'] = "Sales by customers";//0
$LANG['sales_report'] = "Sales Report";//0
$LANG['sanity_check'] = "Sanity check of invoices";//0
$LANG['save'] = "Saglabāt";//1
$LANG['save_biller'] = "Saglabāt kreditoru";//1
$LANG['save_biller_failure'] = "Something went wrong, please try saving the biller again<br />";//0
$LANG['save_biller_success'] = "Biller successfully saved, <br /> you will be redirected to the Manage Billers page";//0
$LANG['save_custom_field'] = "Save Custom Field";//0
$LANG['save_custom_field_failure'] = "Something went wrong, please try editing the custom field again<br />";//0
$LANG['save_custom_field_success'] = "Custom field successfully saved, <br /> you will be redirected back to the Manage Custom Fields";//0
$LANG['save_customer'] = "Saglabāt klientu";//1
$LANG['save_customer_failure'] = "Something went wrong, please try saving the customer again";//0
$LANG['save_customer_success'] = "Customer successfully saved,<br /> you will be redirected back to the Manage Customers page";//0
$LANG['save_defaults'] = "Save Defaults";//0
$LANG['save_defaults_failure'] = "Something went wrong, please try setting the system defaults again";//0
$LANG['save_defaults_success'] = "The system default has been successfully updated,<br /> you will be redirected back to System Defaults page";//0
$LANG['save_invoice'] = "Saglabāt pavadzīmi";//1
$LANG['save_invoice_failure'] = "Something went wrong, please try saving the invoice again";//0
$LANG['save_invoice_items_success'] = "Processing invoice items<br /> you will be redirected back to the Quick View of this invoice";//0
$LANG['save_invoice_success'] = "Processing invoice, <br /> you will be redirected Quick View of this invoice";//0
$LANG['save_payment_failure'] = "Something went wrong, please try saving the payment again";//0
$LANG['save_payment_invoice_success'] = "Payment successfully processed, <br /> you will be redirected to the Manage Invoices page";//0
$LANG['save_payment_success'] = "Payment successfully processed,<br /> you will be redirected back to the Manage Payments page";//0
$LANG['save_payment_type'] = "Saglabāt nomaksas veidu";//1
$LANG['save_payment_type_failure'] = "Something went wrong, please try saving the payment type again";//0
$LANG['save_payment_type_success'] = "Payment Type successfully saved, <br /> you will be redirected back to the Manage Payment Types";//0
$LANG['save_preference_failure'] = "Something went wrong, please try saving the invoice preference again";//0
$LANG['save_preference_success'] = "Invoice preference successfully saved,<br /> you will be redirected to Manage Preferences page";//0
$LANG['save_product'] = "Saglabāt preci";//1
$LANG['save_product_failure'] = "Something went wrong, please try saving the product again";//0
$LANG['save_product_success'] = "Product successfully saved, <br /> you will be redirected to the Manage Products page";//0
$LANG['save_tax_rate'] = "Saglabāt nodokli";//1
$LANG['save_tax_rate_failure'] = "Something went wrong, please try adding the tax rate again";//0
$LANG['save_tax_rate_success'] = "Tax rate successfully saved, <br /> you will be redirected to the Manage Tax Rates page";//0
$LANG['save_user_failure'] = "Something went wrong, please try saving the user again<br />";//0
$LANG['save_user_success'] = "User successfully saved, <br /> you will be redirected to the Manage Users page";//0
$LANG['select_invoice'] = "Lūdzu izvēlaties pavadzīmi";//1
$LANG['settings'] = "Settings";//0
$LANG['shortcut'] =" Shortcut menu";//0
$LANG['show_details'] = "Show details";//0
$LANG['simple_invoices'] = "Simple Invoices";//0
$LANG['state'] = "State";//0
$LANG['stats'] =" Quick reports";//0
$LANG['stats_biller'] ="Top Biller - by amount invoiced";//0
$LANG['stats_customer'] ="Top Customer - by amount invoiced";//0
$LANG['stats_debtor'] ="Largest debtor";//0
$LANG['street'] = "Ielas adrese";//1
$LANG['street2'] = "Ielas adrese 2";//1
$LANG['sub_total'] = "Sub Total";//0
$LANG['subject'] = "Subject";//0
$LANG['sum'] = "Summa";//1
$LANG['summary'] = "Summary";//0
$LANG['summary_of_accounts'] = "Summary of accounts";//0
$LANG['system_defaults'] = "System Defaults";//0
$LANG['system_preferences'] = "System Preferences";//0
$LANG['tax'] = "Nodoklis";//1
$LANG['tax_description'] = "Nodokļa info";//1
$LANG['tax_id'] = "Nodokļa ID";//1
$LANG['tax_percentage'] = "Tax Percentage";//0
$LANG['tax_rate'] = "Tax Rate";//0
$LANG['tax_rate_details'] = "Tax rate details";//0
$LANG['tax_rate_id'] = "Tax Rate ID";//0
$LANG['tax_rate_to_add'] = "Tax rate to add";//0
$LANG['tax_rates'] = "Tax Rates";//0
$LANG['tax_total'] = "Total tax included";//0
$LANG['telephone_short'] = "Tel";//0
$LANG['to'] = "To";//0
$LANG['total'] = "Total";//0
$LANG['total_amount'] = "Total amount";//0
$LANG['total_by_aging_periods'] = "Total by Aging periods";//0
$LANG['total_invoices'] = "Total Invoices";//0
$LANG['total_owed_per_customer'] = "Total owed per Customer";//0
$LANG['total_owing'] = "Parāda kopsumma";//1
$LANG['total_paid'] = "Nomaksas kopsumma";//1
$LANG['total_sales'] = "Total Sales";//0
$LANG['total_sales_by_customer'] = "Total Sales by Customer";//0
$LANG['total_style'] = "Total style";//0
$LANG['total_taxes'] = "Total Taxes";//0
$LANG['total_uppercase'] = "KOPSUMMA";//0
$LANG['totals'] = "Kopsumma";//0
$LANG['Unit_Cost'] = "Unit Cost";//0
$LANG['unit_price'] = "Unit Price";//0
$LANG['upgrading_simple_invoices'] = "Upgrading Simple Invoices";//0
$LANG['user_add'] = "Add User";//0
$LANG['users'] = "Users";/0
$LANG['using_simple_invoices'] = "Using Simple Invoices";//0
$LANG['view'] = "View";//0
$LANG['want_more_fields'] = "want more fields";//0
$LANG['welcome'] = "Welcome to ";//0
$LANG['what_are_custom_fields'] = "What are custom fields ";//0
$LANG['whats_all_this_inv_pref'] = "Whats all this Invoice Preference stuff about ";//0
$LANG['whats_this_page_about'] = "What's this page about ";//0
$LANG['wheres_the_edit_button'] = "Wheres the edit button ";//0
$LANG['zip'] = "Pasta kods";//1
?>
