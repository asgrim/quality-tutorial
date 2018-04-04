Feature: Booking a room for a hotel

  Policies:
   - All rooms must be paid in advance
   - Holiday period "Super Saver" rate is £200/night
   - Holiday period "Flexible" rate is £300/night
   - Term-time rates are always £50 less
   - Loyalty Card points can be used in blocks of 500 points
   - Each 500 points used discounts the rate by £50
   - For each £10 spent, customers will earn 1 point

  Scenario: Booking a saver rate in summer school holiday
    Given I am not a Loyalty Card holder
    When I book a room for 2 nights during the summer holiday holiday period
    And I choose the "Super Saver" rate
    Then I should see that the rate is £200 per night
    And the total amount payable up front is £400
    And I will not be able to cancel or change my booking

  Scenario: Using Loyalty Card points gets me a reduced rate in summer school holiday
    Given I am a Loyalty Card holder with 800 points
    When I book a room for 2 nights during the summer holiday holiday period
    And I choose the "Super Saver" rate
    And I opt use 500 loyalty points
    Then I should see that the rate is £200 per night
    And I have a discount of £50 from using loyalty points
    And the total amount payable up front is £350
    And I will have 335 points left
    And I will not be able to cancel or change my booking

  Scenario: Using Loyalty Card points must be done in blocks of 500 points
    Given I am a Loyalty Card holder with 800 points
    When I book a room for 2 nights during the summer holiday holiday period
    And I choose the "Super Saver" rate
    And I try to use 400 loyalty points
    Then I should be informed that points must be used in blocks of 500 points

  Scenario: Booking a flexible rate in summer school holiday
    Given I am a Loyalty Card holder with 100 points
    When I book a room for 2 nights during the summer holiday holiday period
    And I choose the "Flexible" rate
    Then I should see that the rate is £300 per night
    And the total amount payable up front is £600
    And I will have 160 points left
    And I have the option to cancel or change my booking

  Scenario: Booking a flexible rate in term time
    Given I am not a Loyalty Card holder
    When I book a room for 3 nights during term-time
    And I chose the "Flexible" rate
    Then I should see that the rate is £250 per night
    And the total amount payable up front is £750
    And I have the option to cancel or change my booking
