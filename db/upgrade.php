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
 * Local plugin "Navbar Plus" - Upgrade steps
 *
 * @package    local_navbarplus
 * @copyright  2022 Moodle an Hochschulen e.V. <kontakt@moodle-an-hochschulen.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * Upgrade steps for this plugin
 * @param int $oldversion the version we are upgrading from
 * @return boolean
 */
function xmldb_local_navbarplus_upgrade($oldversion) {
    // Change d-*-block classes to d-*-flex classes in the settings and language pack for Moodle 4.0.
    if ($oldversion < 2021120404) {
        // Get old setting.
        $config = get_config('local_navbarplus', 'inserticonswithlinks');

        // Replace d-*-block with d-*-flex.
        $config = preg_replace('/d-(sm-|md-|lg-|xl-)?block/', 'd-${1}flex', $config);

        // Store the modified setting.
        set_config('inserticonswithlinks', $config, 'local_navbarplus');

        upgrade_plugin_savepoint(true, 2021120404, 'local', 'navbarplus');
    }

    return true;
}
