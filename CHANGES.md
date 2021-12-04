moodle-local_navbarplus
========================

Changes
-------

### v3.10-r3

* 2021-12-04 - Add noopener and noreferrer when opening links in a new window - Thanks to Indrajit Raychaudhuri.

### v3.10-r2

* 2021-02-05 - Make codechecker fully happy
* 2021-02-05 - Move Moodle Plugin CI from Travis CI to Github actions

### v3.10-r1

* 2021-01-09 - Fix function call to get user tours which was renamed in 3.10 with MDL-69739 - Thanks to Leon Stringer.
* 2021-01-09 - Prepare compatibility for Moodle 3.10.
* 2021-01-06 - Change in Moodle release support:
               For the time being, this plugin is maintained for the most recent LTS release of Moodle as well as the most recent major release of Moodle.
               Bugfixes are backported to the LTS release. However, new features and improvements are not necessarily backported to the LTS release.
* 2021-01-06 - Improvement: Declare which major stable version of Moodle this plugin supports (see MDL-59562 for details).

### v3.9-r1

* 2020-07-17 - Fixed broken behat step.
* 2020-07-16 - Prepare compatibility for Moodle 3.9.

### v3.8-r1

* 2020-02-18 - Prepare compatibility for Moodle 3.8.

### v3.7-r2

* 2020-02-13 - Adapt the placement of the icons in the navbar due to Moodle core upstream changes in MDL-67577.
               PLEASE NOTE: From now on, local_navbarplus icons will be placed on the _right_ side of the Moodle
               core icons and not on the _left_ side anymore.
* 2019-06-26 - Removed the optional aspect from the behat tests scenarios.

### v3.7-r1

* 2019-06-19 - Added Behat tests.
* 2019-06-17 - Improved accessibility for the icons.
* 2019-06-17 - Prepare compatibility for Moodle 3.7.

### v3.6-r3

* 2019-06-19 - Fixed bug that added id attribute to all other items.

### v3.6-r2

* 2019-05-31 - Target link to FontAwesome icon list to FontAwesome 4.7.0 which is still used by Moodle core.

### v3.6-r1

* 2019-01-16 - Check compatibility for Moodle 3.6, no functionality change.

### v3.5-r2

* 2019-01-09 - Unified CSS classes: changed local_navbarplus_resetusertour to localnavbarplus-resetusertour.
* 2019-01-05 - Bugfix: Corrected check for the user tours setting.
* 2018-12-05 - Changed travis.yml due to upstream changes.

### v3.5-r1

* 2018-05-24 - Changed setting description and README due to changes in referred Bootstrap classes.
* 2018-05-24 - Changed CSS selectors due to changes in Boost. IMPORTANT: Theme clean is no longer supported!
* 2018-05-24 - Check compatibility for Moodle 3.5, no functionality change.

### v3.4-r3

* 2018-05-16 - Implement Privacy API.

### v3.4-r2

* 2018-03-05 - Fixed Bug for openinnewwindow feature.
* 2018-02-22 - Added further information to the README.md.

### v3.4-r1

* 2017-12-21- Check compatibility for Moodle 3.4, no functionality change.

### v3.3-r2

* 2017-12-15 - Improved HTML structure for the icons.
* 2017-12-05 - Added Workaround to travis.yml for fixing Behat tests with TravisCI.

### v3.3-r1

* 2017-11-23 - Removed support for Moodle pix icons.
* 2017-11-23 - Small fix to prevent icons with target blank from being shown when they do not match the language setting.
* 2017-11-23 - Check compatibility for Moodle 3.3, no functionality change.
* 2017-11-08 - Updated travis.yml to use newer node version for fixing TravisCI error.

### v3.2-r8

* 2017-10-05 - Fixed undefined property notice bug caused by the additional id parameter.

### v3.2-r7

* 2017-10-04 - Added possibility to add an individual element id.
* 2017-10-04 - Added possibility to add individual CSS classes.
* 2017-09-18 - Added a hint to the README.md how to individually set another icon for the reset user tour feature.

### v3.2-r6

* 2017-09-14 - Fix to prevent adding empty containers if elements shall not be displayed.

### v3.2-r5

* 2017-08-11 - Fixed string in lang package.

### v3.2-r4

* 2017-08-11 - Setting to place an icon in the navbar for users to restart user tours of the current page.

### v3.2-r3

* 2017-06-26 - Added possibility to add language support and new window attribute.
* 2017-06-17 - Add Travis CI support

### v3.2-r2

* 2017-06-02 - Make codechecker happy.

### v3.2-r1

* 2017-05-12 - Added support for Clean theme.
* 2017-05-10 - Initial version.
