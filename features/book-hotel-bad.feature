Feature: Booking a room for a hotel

  Scenario: Making a successful booking
    Given I am on "/select-dates"
    When I fill in ".check-in-date" with "3/12/18"
    And I fill in ".check-out-date" with "6/12/18"
    And I press ".next"
    Then I should see "£300" in the ".price-total" element
    When I fill in "Credit Card Number" with "4242424242424242"
    And I fill in "Expiry Date" with "01/19"
    And I fill in "CCV (three digits from the back)" with "123"
    And I press ".make-payment"
    Then I should see "your booking has been confirmed"
    And I should see an ".booking-ref" element
    And I should see "£300" in the ".receipt-total" element
