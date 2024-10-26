moodle-local_navbarplus
========================

[![Moodle Plugin CI](https://github.com/moodle-an-hochschulen/moodle-local_navbarplus/workflows/Moodle%20Plugin%20CI/badge.svg?branch=main)](https://github.com/moodle-an-hochschulen/moodle-local_navbarplus/actions?query=workflow%3A%22Moodle+Plugin+CI%22+branch%3Amain)

Moodle plugin which enhances the functionality of Moodle's page header navbar.


Requirements
------------

This plugin requires Moodle 4.5+


Motivation for this plugin
--------------------------

In Moodle, admins can easily add own menu items to the custom menu. However, this custom menu will be hidden from the page header navbar on small screens due to the responsiveness as there is not enough space for this section. Depending on the theme base, the custom menu items will be gone (in theme Clean) or will occur in the footer as plain links (in theme Boost).

So we came up with the idea for this plugin to be able to add additional content to the page header navbar going beyond the possibilities of the existing custom menu.

Installation
------------

Install the plugin like any other plugin to folder
/local/navbarplus

See http://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins


Usage & Settings
----------------

After installing the plugin, it does not do anything to Moodle yet.

To configure the plugin and its behaviour, please visit:
Site administration -> Appearance -> Navbar Plus.

There, you find two settings:

### 1. Icons with links

With this setting you can add link icons to the header navbar left to the icons "messages" and "notifications".
Each line consists of an icon image, a link URL, a text, supported language(s) (optional) and new window setting (optional) - separated by pipe characters. Each icon needs to be written in a new line. For example:

```
fa-question|http://moodle.org|Moodle|en,de|true|hidden-small-down
fa-sign-out|/login/logout.php|Logout||false
```

Further information to the parameters:
* Image: You can add Font Awesome icon identifiers (<a href="http://fontawesome.io/icons/">See the icon list on fontawesome.io</a>). Font Awesome is included in Moodle's core Clean and Boost themes since the version 3.3.
* Link: The link target can be defined by a full web URL (e.g. https://moodle.org) or a relative path within your Moodle instance (e.g. /login/logout.php).
* Title: This text will be written in the title and alt attributes of the icon.
* Supported language(s) (optional): This setting can be used for displaying the link to users of the specified language only. Separate more than one supported language with commas. If the link should be displayed in all languages, then leave this field empty.
* New window (optional): By default the link will be opened in the same window and the value of this setting is set to false. If you want to open the link in a new window set the value to true.
* Additional classes (optional): You can add individual classes with this optional parameter. A common use case might be to add Bootstrap's responsive classes to hide an icon for specific display sizes. <br/> You can look up the definitions for the responsive Bootstrap display classes for <a href="https://getbootstrap.com/docs/4.0/utilities/display/">Bootstrap version 4</a> for all Boost based themes.
  The most important classes for Boost based themes might be "d-none d-sm-block" for hiding an icon on small devices or "d-sm-none" for only displaying the icon on small screens.
* ID (optional): You can add an individual ID to your icon element. This makes it possible to address this specific icon easily with CSS (for example for the Moodle user tours). The string you enter here will always be prefixed with "localnavbarplus-".

Please note:
* Pipe dividing for optional parameters is always needed if they are located between other options. This means that you have to separate params with the pipe character although they are empty. Also see the example for the Font Awesome icon above.
* If the icon does not show up in the navbar, please check if all mandatory params are set correctly and if the optional language setting fits to your current Moodle user language.

### 2. Reset user tour link

With this setting you can place a Font Awesome map icon in the navbar with which the user is able to restart the user tour for the current page. By default Boost places the link to reset the user tour within the footer. This might not be eye catching. With this setting you can place the link to the more visible navbar.

Please note:

If you want to change this icon, you can do this within your own Custom CSS / RAW SCSS section of your theme. This is the CSS code you need:
```
#localnavbarplus-resetusertour i.fa::before {
   content: "\f11d";
}
```
Please replace this example "content" code with your desired Font Awesome icon's unicode.

If you want to hide the footer link to reset the user tour, you can add the following code to your Raw SCSS setting:
```
#page-footer .tool_usertours-resettourcontainer {
    display: none;
}
```
The theme <a href ="https://moodle.org/plugins/theme_boost_campus">Boost Campus</a> implements a own setting to hide the standard link to reset the user tour.


Capabilities
------------

This plugin does not add any additional capabilities.


Scheduled Tasks
---------------

This plugin does not add any additional scheduled tasks.


How this plugin works / Pitfalls
--------------------------------

The functionality of this plugin is simply achieved by using the *_render_navbar_output() hook which allows plugins to add HTML code to the page header navbar.

The purpose of the plugin is to place _only few_ important icons with links in the page header navbar. If a larger number of icons will be placed, the icons will be wrapped beneath the navbar on small screens. So please test this behavior in the browser when adding content to this setting by shrinking the browser window to a width equivalent to a small screen device. If the icon link container is wrapped beneath the navbar, then please consider using less icons.


Icon colors
-----------

The icons will be added to the navbar with the default Moodle icon color. You can change this either in your own CSS file or in the custom CSS or the Raw SCSS section in your theme.

Example for changing the color of the Font Awesome icon to white:
```
header.navbar .localnavbarplus i.fa::before {
    color: #fff;
}
```


Icon sizes
-----------

The icons inherit the default Moodle icon size. Unfortunately, not all Font Awesome icons are equal in their size, so the size of the added icons can vary in size from the existing Moodle icons. You can change the font size of the icons that differ in their size in your own CSS file or in the custom CSS or the Raw SCSS section in your theme.

Example for increasing the font size for the logout icon used in the example above:
```
header.navbar .localnavbarplus .fa-sign-out {
    font-size: 19px;
}
```


Theme support
-------------

This plugin is developed and tested on Moodle Core's Boost theme.
It should also work with Boost child themes, including Moodle Core's Classic theme. However, we can't support any other theme than Boost.


Plugin repositories
-------------------

This plugin is published and regularly updated in the Moodle plugins repository:
http://moodle.org/plugins/view/local_navbarplus

The latest development version can be found on Github:
https://github.com/moodle-an-hochschulen/moodle-local_navbarplus


Bug and problem reports / Support requests
------------------------------------------

This plugin is carefully developed and thoroughly tested, but bugs and problems can always appear.

Please report bugs and problems on Github:
https://github.com/moodle-an-hochschulen/moodle-local_navbarplus/issues

We will do our best to solve your problems, but please note that due to limited resources we can't always provide per-case support.


Feature proposals
-----------------

Due to limited resources, the functionality of this plugin is primarily implemented for our own local needs and published as-is to the community. We are aware that members of the community will have other needs and would love to see them solved by this plugin.

Please issue feature proposals on Github:
https://github.com/moodle-an-hochschulen/moodle-local_navbarplus/issues

Please create pull requests on Github:
https://github.com/moodle-an-hochschulen/moodle-local_navbarplus/pulls

We are always interested to read about your feature proposals or even get a pull request from you, but please accept that we can handle your issues only as feature _proposals_ and not as feature _requests_.


Moodle release support
----------------------

Due to limited resources, this plugin is only maintained for the most recent major release of Moodle as well as the most recent LTS release of Moodle. Bugfixes are backported to the LTS release. However, new features and improvements are not necessarily backported to the LTS release.

Apart from these maintained releases, previous versions of this plugin which work in legacy major releases of Moodle are still available as-is without any further updates in the Moodle Plugins repository.

There may be several weeks after a new major release of Moodle has been published until we can do a compatibility check and fix problems if necessary. If you encounter problems with a new major release of Moodle - or can confirm that this plugin still works with a new major release - please let us know on Github.

If you are running a legacy version of Moodle, but want or need to run the latest version of this plugin, you can get the latest version of the plugin, remove the line starting with $plugin->requires from version.php and use this latest plugin version then on your legacy Moodle. However, please note that you will run this setup completely at your own risk. We can't support this approach in any way and there is an undeniable risk for erratic behavior.


Translating this plugin
-----------------------

This Moodle plugin is shipped with an english language pack only. All translations into other languages must be managed through AMOS (https://lang.moodle.org) by what they will become part of Moodle's official language pack.

As the plugin creator, we manage the translation into german for our own local needs on AMOS. Please contribute your translation into all other languages in AMOS where they will be reviewed by the official language pack maintainers for Moodle.


Right-to-left support
---------------------

This plugin has not been tested with Moodle's support for right-to-left (RTL) languages.
If you want to use this plugin with a RTL language and it doesn't work as-is, you are free to send us a pull request on Github with modifications.


Maintainers
-----------

The plugin is maintained by\
Moodle an Hochschulen e.V.


Copyright
---------

The copyright of this plugin is held by\
Moodle an Hochschulen e.V.

Individual copyrights of individual developers are tracked in PHPDoc comments and Git commits.


Copyright history
-----------------

This plugin was initially built, maintained and published by\
Ulm University\
Communication and Information Centre (kiz)\
Alexander Bias and Kathrin Osswald

It was contributed to the Moodle an Hochschulen e.V. plugin catalogue in 2022.
