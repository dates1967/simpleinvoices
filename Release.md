# Release Management #
In order to get a better and more stable code we try to formalize the release management.

## Release Planning ##
  1. After a new version has been released the next version is planed. All issues that should be solved in the next version will be given the milestone "next-release"
  1. The leader will keep an eye on the list and will give a message in the [dev forum](http://dev.simpleinvoices.org/) when he sees that all issues of this milestone are solved or will be solved in the next few days.
  1. The last preparations before the release can be done then.

## Pre release tests ##
A release will only happen if no PHP related errors are present in the code. In order to test this the following code is called in the root directory of the project:
```
find ./ -type f -name \*.php -exec php -l -d error_reporting=32767 '{}' \; | grep -v "No syntax errors detected"
```

## Release Process ##
  1. When the code is ready a new "tag" is set on the current trunk version. The tag will have the same name is the version (e.g. 2011-1).

Justin: Please write more about how this version number is set up.

  1. The tag will then be exported from Subversion to a directory on the local computer.
  1. This directory will then be zipped and uploaded to the Downloads-section on Google Code.
  1. get john from teammc to do a windows version
  1. The windows version name will correspond to the simple invoices version, If updates/fixes are needed for the program and not for si then the new release's version will have "fix-1" added to it name.
  1. update windows release package with new si stable from google code
  1. The windows version will then be zipped and uploaded to the Downloads-section on Google Code as well.
  1. Mark the two new packages as featured and the old ones as deprecated.
  1. Inform everyone about the new release
    * announce on forum
    * announce on blog
    * announce on email lists

Then continue with the planning again.