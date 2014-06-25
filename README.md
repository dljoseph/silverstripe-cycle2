SilverStripe Cycle2 Module
========================================

Maintainer Contacts
-------------------
*  DL Joseph (<darrenleejoseph@gmail.com>)

Requirements
------------

* SilverStripe 3.1 - [master branch](https://github.com/dljoseph/silverstripe-cycle2)


Installation Instructions
-------------------------

1. Place this directory in the root of your SilverStripe installation.
2. Visit yoursite.com/dev/build to rebuild the database.

Usage Overview
--------------
A "Slides" tab will be added to every Page and subclass of page.
From there you can add slides to the page.  

This is very basic and at present a slide consists of an image, title and description.


### Template Usage
Place `$Slideshow` in the template where you want your slideshow to appear. 




Known Issues
------------
This is an extremely basic pre-alpha implementation of cycle2 - it is only the beginning of what will 
be a complete module in the near future.  It only makes use of the slide image at the moment 
but needs to be modified to use the slide title, description/caption and include various cycle2 
slide options, which have not been implemented yet.

[Issue Tracker](http://github.com/dljoseph/silverstripe-cycle2/issues)