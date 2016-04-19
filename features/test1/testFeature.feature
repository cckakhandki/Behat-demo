Feature: test google

  @test3
  Scenario: dsa
    Given I am on homepage
    And I wait for 2 seconds
    And I should see the following links:
      | links   |
      | [+] all |
      | [-] all |
      
    Then I should see following:
      """
      Suite : newtours
      
      I want to test Login functionality
      
      Feature: Test my website
      
      Feature has passed
      
      Use our Flight Finder to search for the lowest fare on participating airlines. Once you've booked your flight, don't forget to visit the Mercury Tours Hotel Finder to reserve lodging in your destination city.
      
      """
