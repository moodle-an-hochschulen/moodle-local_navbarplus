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
 * Steps definitions for local_navbarplus
 *
 * This script is only called from Behat as part of it's integration
 * in Moodle.
 *
 * @package   local_navbarplus
 * @category  test
 * @copyright 2019 Kathrin Osswald <kathrin.osswald@uni-ulm.de>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// NOTE: no MOODLE_INTERNAL test here, this file may be required by behat before including /config.php.


/**
 * Steps definitions for local_navbarplus
 *
 * This script is only called from Behat as part of it's integration
 * in Moodle.
 *
 * @package   local_navbarplus
 * @category  test
 * @copyright 2019 Kathrin Osswald <kathrin.osswald@uni-ulm.de>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_local_navbarplus extends behat_base {
    // @codingStandardsIgnoreStart
    /**
     * Checks, that the specified element with this title, link and iconclass attribute is existent on the page.
     *
     * @Then /^I should see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" and the iconclass "(?P<icon_string>(?:[^"]|\\")*)" and the link "(?P<link_string>(?:[^"]|\\")*)" in the navbar$/
     *
     * @param string $title
     * @param string $icon
     * @param string $link
     */
    public function assert_element_in_navbar_contains_title_iconclass_link($title, $icon, $link) {
    // @codingStandardsIgnoreEnd

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"][contains(@href, "' . $link . '")]';
        $elementxpath .= '/descendant::i[contains(@class, "' . $icon . '")]';

        // Check if the element exists.
        $this->execute("behat_general::should_exist",
            array($elementxpath, "xpath_element"));
    }

    // @codingStandardsIgnoreStart
    /**
     * Checks, that the specified element with this title, link and iconclass attribute is not existent on the page.
     *
     * @Then /^I should not see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" and the iconclass "(?P<icon_string>(?:[^"]|\\")*)" and the link "(?P<link_string>(?:[^"]|\\")*)" in the navbar$/
     *
     * @param string $title
     * @param string $icon
     * @param string $link
     */
    public function assert_element_in_navbar_not_contains_title_iconclass_link($title, $icon, $link) {
    // @codingStandardsIgnoreEnd

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"][contains(@href, "' . $link . '")]';
        $elementxpath .= '/descendant::i[contains(@class, "' . $icon . '")]';

        // Check if the element does not exist.
        $this->execute("behat_general::should_not_exist",
                array($elementxpath, "xpath_element"));
    }

    /**
     *  Checks, that the specified element with this title attribute is existent on the page.
     *
     * @Then /^I should see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" in the navbar$/
     *
     * @param string $title
     */
    public function assert_element_in_navbar_contains_title($title) {

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"]';

        // Check if the element exists.
        $this->execute("behat_general::should_exist",
            array($elementxpath, "xpath_element"));
    }

    /**
     * Checks, that the specified element with this title attribute is not existent on the page.
     *
     * @Then /^I should not see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" in the navbar$/
     *
     * @param string $title
     */
    public function assert_element_in_navbar_not_contains_title($title) {

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"]';

        // Check if the element does not exist.
        $this->execute("behat_general::should_not_exist",
            array($elementxpath, "xpath_element"));
    }

    /**
     * Checks, that the specified element is existent and has new window attribute.
     *
     * @Then /^I should see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" with the new window option in the navbar$/
     *
     * @param string $title
     */
    public function assert_element_in_navbar_has_new_window_attribute($title) {

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"][contains(@target, "_blank")]';

        // Check if the element exists.
        $this->execute("behat_general::should_exist",
            array($elementxpath, "xpath_element"));
    }

    /**
     * Checks, that the specified element is existent and has new window attribute.
     *
     * @Then /^I should see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" without the new window option in the navbar$/
     *
     * @param string $title
     */
    public function assert_element_in_navbar_not_has_new_window_attribute($title) {

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"][contains(@target, "_blank")]';

        // Check if the element exists.
        $this->execute("behat_general::should_not_exist",
            array($elementxpath, "xpath_element"));
    }

    // @codingStandardsIgnoreStart
    /**
     * Checks, that the specified element is existent and has additional classes attribute.
     *
     * @Then /^I should see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" and the class "(?P<class_string>(?:[^"]|\\")*)" in the navbar$/
     *
     * @param string $title
     * @param string $class
     */
    public function assert_element_in_navbar_has_additional_class($title, $class) {
    // @codingStandardsIgnoreEnd

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant::div[contains(@class, "' . $class . '")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"]';

        // Check if the element exists.
        $this->execute("behat_general::should_exist",
            array($elementxpath, "xpath_element"));
    }

    // @codingStandardsIgnoreStart
    /**
     * Checks, that the specified element is existent and has additional id attribute.
     *
     * @Then /^I should see the icon with the title "(?P<title_string>(?:[^"]|\\")*)" and the id "(?P<id_string>(?:[^"]|\\")*)" in the navbar$/
     *
     * @param string $title
     * @param string $id
     */
    public function assert_element_in_navbar_has_additional_id($title, $id) {
    // @codingStandardsIgnoreEnd

        // We are searching for our icons in the navbar.
        $elementxpath = '//ul[contains(@class, "navbar-nav")]';
        $elementxpath .= '/li[contains(@class, "nav-item")]';
        $elementxpath .= '/descendant::div[contains(@id, "' . $id . '")]';
        $elementxpath .= '/descendant-or-self::a[@title="'. $title . '"]';

        // Check if the element exists.
        $this->execute("behat_general::should_exist",
            array($elementxpath, "xpath_element"));
    }
}
