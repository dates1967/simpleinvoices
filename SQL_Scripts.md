# Introduction #

Any change to the database design must be done in a couple of places so that everything works all OK for the users


# Details #

  * ./sys/include/sql\_patches.php
    * Add a new patch to the sql patches file - this file gets run when the users is upgrading from a previous version. SI check what patches has been run when it opens and prompts the user to run the required patches if it finds any unrun
    * Below is an example sql patch
```
    $patch['249']['name'] = "Make Simple Invoices faster - add index";
    $patch['249']['patch'] = "ALTER TABLE `".TB_PREFIX."invoices` ADD INDEX(`biller_id`) ;";
    $patch['249']['date'] = "20100419";   

```
  * The below 4 files need to be updated with the new fields/changes
    * sys/databases/json/sample\_data.json
    * sys/databases/json/essential\_data.json
    * databases/mysql/Full\_Simple\_Invoices.sql
      * i normally generate this from phpmyadmin once the db is all up to date
    * sys/databases/mysql/structure.sql