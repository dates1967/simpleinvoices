# Description #

Multi-Instance allows you to have multiple instances of Simple Invoices without the need to include heavy libraries for each running instance.

# Structure #

Simple Invoices has been divided into _public_ and _private_ files. _Public_ files are those contained in the _/public_ folder, while all other files are considered _private_.

_Public_ files must be on your document root path, while private files may be in the document root, or not.

# Multi-Instance #

An instance will be a public directory. Let's see an example:

## Creating a New Instance ##

First create a duplicate of the public directory with another name; for example, _public2_

Now edit the index.php in the new directory and make sure APPLICATION\_PATH is pointing to your _/app/_ path. Also double check the includes are pointing to the correct paths. Usually if you have cloned the public directory it should work out of the box; however there is one thing that **ALWAYS** must be changed: the configuration file. Make sure you change from _config.ini_ to whatever name you want to give it; for example: config2.ini.

Now go into the private _/app/config/_ and create a new configuration file with the same name you've setup in the index.php of the previous step. You may even clone the existing _config.ini_.

Each configuration file needs to point to a different database in order to access different data. So edit the database settings in order to use distinct databases for each instance.

Also, the session name **MUST** be changed between instances. Since sessions and authentication work in the same way for each instance using the same session name could allow a user authenticated on instance1 to access instance2. To avoid this the session name must be changed and, since session names won't match you avoid cross instances hacks.

# Additional Setups for Servers #

_APPLICATION\_PATH_ can be setup as an enviroment variable for Apache, same thing applies for _APPLICATION\_ENV_. This allows easier setup of instances, however you must have access to apache's enviroment variables.