<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local plugin "Navbar Plus" - Language pack
 *
 * @package    local_navbarplus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Navbar Plus';
$string['setting_inserticonswithlinks'] = 'Icons with links';
$string['setting_inserticonswithlinks_desc'] = 'With this setting you can add link icons to the header navbar left to the icons "messages" and "notifications".<br/>
Each line consists of an icon image, a link URL and a text, separated by pipe characters. Each icon needs to be written in a new line. <br/>
For example:<br/>
a/help|http://moodle.org|Moodle <br/>
fa-sign-out|/login/logout.php|Logout <br/><br/>
Further information to the parameters:<br/>
<b>Image:</b> You can add identifiers for a Moodle icon from the pix folder (<a href="https://github.com/moodle/moodle/tree/master/pix">see the icon list on github.com</a>) or a Font Awesome icon identifier (<a href="http://fontawesome.io/icons/">See the icon list on fontawesome.io</a>). Font Awesome is not included in Boost from Moodle core, but there are some Boost child themes and other solutions from third parties which add Font Awesome support to Moodle.<br/>
<b>Link:</b> The link target can be defined by a full web URL (e.g. https://moodle.org) or a relative path within your Moodle instance (e.g. /login/logout.php). <br/>
<b>Title:</b> This text will be written in the title and alt attributes of the icon.';
