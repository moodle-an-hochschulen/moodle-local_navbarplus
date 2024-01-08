@local @local_navbarplus
  # Please note:
  # The short notation for the settings like
  #     Given the following config values are set as admin:
  #      | config               | value                                  | plugin           |
  #      | inserticonswithlinks | fa-sign-out|/login/logout.php|Logout   | local_navbarplus |
  # does not work here, as the value contains pipe characters and so the table does not have same number of columns in every row.
  # Escaping the pipes with backslash helped, but then the tests failed because the value is not usable anymore.
Feature: Configuring the navbarplus plugin
  In order to have custom items in the additional navbar
  As admin
  I need to be able to configure the navbarplus plugin

  Scenario: Configuring item with mandatory attributes
    When I log in as "admin"
    And I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "fa-sign-out|/login/logout.php|Logout"
    And I press "Save"
    Then I should see the icon with the title "Logout" and the iconclass "fa-sign-out" and the link "/login/logout.php" in the navbar

  Scenario: Configuring item with less than mandatory attributes
    When I log in as "admin"
    When I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "Falsetest"
    And I press "Save"
    And I should not see the icon with the title "Falsetest" in the navbar

  Scenario: Configuring item with additional language attribute
    Given the following "language packs" exist:
      | language |
      | de       |
    And the following "users" exist:
      | username | lang |
      | student1 | de   |
    When I log in as "admin"
    And I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "fa-language|/?redirect=0|Languagetest|de"
    And I press "Save"
    Then I should not see the icon with the title "Languagetest" and the iconclass "fa-language" and the link "/?redirect=0" in the navbar
    And I log out
    When I log in as "student1"
    Then I should see the icon with the title "Languagetest" and the iconclass "fa-language" and the link "/?redirect=0" in the navbar

  Scenario: Configuring item with the new window attribute
    When I log in as "admin"
    And I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "fa-window-maximize|/?redirect=0|Newwindowtest||true"
    And I press "Save"
    Then I should see the icon with the title "Newwindowtest" with the new window option in the navbar

  Scenario: Configuring item with mandatory attributes and check that they don't have the new window attribute
    When I log in as "admin"
    When I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "fa-sign-in|/login/logout.php|Login"
    And I press "Save"
    And I should see the icon with the title "Login" without the new window option in the navbar

  Scenario: Configuring item with additional class attribute
    When I log in as "admin"
    And I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "fa-glass|/?redirect=0|Classtest|||optional-class"
    And I press "Save"
    Then I should see the icon with the title "Classtest" and the class "optional-class" in the navbar

  Scenario: Configuring item with additional id attribute
    When I log in as "admin"
    And I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "fa-id-card|/?redirect=0|Idtest||||optional-id"
    And I press "Save"
    Then I should see the icon with the title "Idtest" and the id "optional-id" in the navbar

  Scenario: Verifying the icon position
    When I log in as "admin"
    When I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "id_s_local_navbarplus_inserticonswithlinks" to "fa-sign-out|/login/logout.php|Logout"
    And I press "Save"
    Then "div.localnavbarplus.nav-link" "css_element" should appear after "div[data-region='popover-region-messages']" "css_element"

  # The steps to create and use the tour were copied from the @tool_usertours Behat feature.
  # This scenario just differs in the aspect which button is used to reset the tour.
  @javascript
  Scenario: Enabling the link to show the reset users tour link in the navbar if a user tour is created for that page
    When I log in as "admin"
    And I navigate to "Appearance > Navbar Plus" in site administration
    And I set the field "Reset user tour link" to "Yes"
    And I press "Save"
    And I add a new user tour with:
      | Name                | First tour |
      | Description         | My first tour |
      | Apply to URL match  | /my/% |
      | Tour is enabled     | 1 |
    And I add steps to the "First tour" tour:
      | targettype                | Title   | id_content                                                                                                                     | Content type   |
      | Display in middle of page | Welcome | Welcome to your personal learning space. We'd like to give you a quick tour to show you some of the areas you may find helpful | Manual         |
    And I add steps to the "First tour" tour:
      | targettype | targetvalue_block | Title    | id_content                                                                    | Content type   |
      | Block      | Timeline          | Timeline | This is the Timeline. All of your upcoming activities can be found here       | Manual         |
      | Block      | Calendar          | Calendar | This is the Calendar. All of your assignments and due dates can be found here | Manual         |
    And I add steps to the "First tour" tour:
      | targettype | targetvalue_selector | Title     | id_content                                                                                         | Content type   |
      | Selector   | .usermenu            | User menu | This is your personal user menu. You'll find your personal preferences and your user profile here. | Manual         |
    When I am on homepage
    Then I should see "Welcome to your personal learning space. We'd like to give you a quick tour to show you some of the areas you may find helpful"
    And I click on "Next" "button" in the "[data-role='flexitour-step']" "css_element"
    And I should see "This is the Timeline. All of your upcoming activities can be found here"
    And I should not see "This is the Calendar. All of your assignments and due dates can be found here"
    And I click on "Next" "button" in the "[data-role='flexitour-step']" "css_element"
    And I should see "This is the Calendar. All of your assignments and due dates can be found here"
    And I should not see "This area shows you what's happening in some of your courses"
    And I click on "Skip tour" "button" in the "[data-role='flexitour-step']" "css_element"
    And I should not see "This area shows you what's happening in some of your courses"
    And I am on homepage
    And I should not see "Welcome to your personal learning space. We'd like to give you a quick tour to show you some of the areas you may find helpful"
    And I should see the icon with the title "Reset user tour on this page (Could take a short time)" in the navbar
    And I click on "#localnavbarplus-resetusertour #resetpagetour" "css_element"
    And I should see "Welcome to your personal learning space. We'd like to give you a quick tour to show you some of the areas you may find helpful"
    And I click on "Skip tour" "button" in the "[data-role='flexitour-step']" "css_element"
    And I am on site homepage
    And I should not see the icon with the title "Reset user tour on this page (Could take a short time)" in the navbar
