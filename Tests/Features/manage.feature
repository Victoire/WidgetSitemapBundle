@mink:selenium2 @alice(Page) @reset-schema
Feature: Manage a Sitemap widget

    Background:
        Given I am on homepage

    Scenario: I can create a new Sitemap widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Sitemap" from the "1" select of "main_content" slot
        Then I should see "Widget (Sitemap)"
        And I should see "1" quantum
        When I select "#2 Homepage" from "_a_static_widget_sitemap[rootPage]"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "Homepage"
        And I should see "English test"

    Scenario: I can update a Sitemap widget
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetSitemap:
            | widgetMap | rootPage | depth |
            | home      | home     | 0     |
        When I reload the page
        Then I should see "Homepage"
        And I should not see "English test"
        When I switch to "edit" mode
        And I edit the "Sitemap" widget
        And I should see "Widget #1 (Sitemap)"
        And I should see "1" quantum
        When I select "#3 English test" from "_a_static_widget_sitemap[rootPage]"
        And I fill in "_a_static_widget_sitemap[depth]" with ""
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should not see "Homepage"
        And I should see "English test"