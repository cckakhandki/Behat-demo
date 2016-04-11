Feature: Test NewTours website
  As an anonymous user 
  I want to test Login functionality

  Background: 
    Given I am on "/"
    And I wait for 2 seconds

  @test2
  Scenario Outline: Newtours Login - invalid1
    When I fill in "userName" with "<user>"
    And I fill in "password" with "<pass>"
    And I press "Login"
    Then I should see following:
      """
      Use our Flight Finder to search for the lowest fare on participating airlines. Once you've booked your flight, don't forget to visit the Mercury Tours Hotel Finder to reserve lodging in your destination city.
      """

    Examples: 
      | user    | pass    |
      | mercury | masds   |
      | ,ercury | mercury |

  @test1
  Scenario: Newtours Login
    And I fill in "userName" with "mercury"
    And I fill in "password" with "mercury"
    #And I take screenshot of current page
    And I press "Login"
    Then I should see following:
      """
      Use our Flight Finder3 to search for the lowest fare on participating airlines. Once you've booked your flight, don't forget to visit the Mercury Tours Hotel Finder to reserve lodging in your destination city.
      """
    #And I take screenshot of current page
