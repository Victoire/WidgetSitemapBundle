@mink:selenium2 @alice(Page)  @reset-schema
Feature: Create a Sitemap widget

    Background:
        Given I maximize the window
        And I am on homepage

    Scenario: I create a new Sitemap widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Sitemap" from the "1" select of "main_content" slot
        Then I should see "Widget  (Sitemap)"