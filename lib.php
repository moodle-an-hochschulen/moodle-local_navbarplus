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
 * Local plugin "Navbar Plus" - Library
 *
 * @package    local_navbarplus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Allow plugins to provide some content to be rendered in the navbar.
 * The plugin must define a PLUGIN_render_navbar_output function that returns
 * the HTML they wish to add to the navbar.
 *
 * @return string HTML for the navbar
 */
function local_navbarplus_render_navbar_output() {
    global $OUTPUT;

    // Fetch overall config.
    $config = get_config('local_navbarplus');

    // Make a new array on delimiter "new line".
    if (isset($config->inserticonswithlinks)) {
        // Reverse the array because the icons are floeted right and would be displayed in the wrong sequence otherwise.
        $lines = array_reverse(explode("\n", $config->inserticonswithlinks));
        $output = '';

        // Parse item settings.
        foreach ($lines as $line) {
            $line = trim($line);
            if (strlen($line) == 0) {
                continue;
            }

            $itemicon = null;
            $itemurl = null;
            $itemtitle = null;

            $output .= html_writer::start_tag('div', array('class' => 'localnavbarplus nav-link'));
            // Make a new array on delimiter "|".
            $settings = explode('|', $line);
            foreach ($settings as $i => $setting) {
                $setting = trim($setting);
                if (!empty($setting)) {
                    switch ($i) {
                        //Check for the first param: icon
                        case 0:
                            // If param contains "/", it's a Moodle pix icon.
                            if (strpos($setting,'/') !== false){
                                $itemicon = $OUTPUT->pix_icon($setting,'');
                            }
                            // If param contains "fa-", it's a Font Awesome icon.
                            elseif (strpos($setting,'fa-') !== false){
                                $itemicon = '<i class="fa ' . $setting . '"></i>';
                            }
                            break;
                        // Check for the second param: URL
                        case 1:
                            // Get the URL
                            try {
                                $itemurl = new moodle_url($setting);
                            } catch (moodle_exception $exception) {
                                // We're not actually worried about this, we don't want to mess up the display
                                // just for a wrongly entered URL.
                                $itemurl = null;
                            }
                            break;
                        // Check for the third param: text for title and alt attribute
                        case 2:
                            $itemtitle = $setting;
                            break;
                    }
                }
            }
            // Add link with icon as a child to the sourrounding div.
            $output .= html_writer::link($itemurl, $itemicon, array('alt'=>$itemtitle, 'title'=>$itemtitle));
            $output .= html_writer::end_tag('div');
        }
    }
    else {
        $output = '';
    }
    return $output;
}
