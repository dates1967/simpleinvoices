# How to translate Simple Invoices #

There are 2 different ways to translate Simple Invoices:

  1. By using Subversion (which is a version control tool) (prefered method)
  1. The manual method.
If your already familiar with subversion use subversion else use the Non Subversion method.

## Subversion ##

  * check out the latest code as described in http://code.google.com/p/simpleinvoices/source/checkout
  * modify the existing files or add your new one (svn add)
  * commit the files (svn commit -m “include a message”)
  * update the Translation bug in our issue tracking system with info amount your new files/edits
    * http://code.google.com/p/simpleinvoices/issues/detail?id=21&can=2&q=

## Manual (Non Subversion) ##

  * get the latest files from the subversion repository http://code.google.com/p/simpleinvoices/source/browse/#svn%2Ftrunk%2Fsys%2Flang
    * http://code.google.com/p/simpleinvoices/source/browse/#svn%2Ftrunk%2Fsys%2Flang%2Fen_GB will have the most up to date info: lang/en-gn/lang.php
  * create or modify the language file of your choice( ie. fr/lang.php )
  * Post your new/or updated language files in Translation bug in our issue tracking system http://code.google.com/p/simpleinvoices/issues/detail?id=21&can=2&q= we will then add it to the source code.

## Note ##

  * also after each variable in the lang files theres a 1 or 0
    * 1 means the variable has been translated
    * 0 means its still to be translated
    * The point to the 1 and 0 is so we can report on which files need updating
    * refer: http://code.google.com/p/simpleinvoices/source/browse/trunk/lang/lang_check.txt for a summary report of status of the lang files
  * Save your translation files as UTF-8. If you are using Windows I recommend you to use Notepad++ http://notepad-plus-plus.org/