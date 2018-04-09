Feature: Booking a room for a hotel

  Glossary:
   - Payment/Card: payment card, e.g. debit card, credit card
   - Charge/Charged: where money has been taken from the payment card to the business
   - Refund/Refunded: where money has been sent back to the payment card from the business
   - Room: the subject of the booking
   - Booking/Booked/Reservation: a confirmed reservation of a room that has been paid for

  Policies:
   - All rooms must be paid in advance
   - All rooms and dates cost the same, so monetary amounts are unimportant
   - Rooms must be available to be booked
   - Room Availability is determined by an external system (e.g. via an API)

  @ui @domain
  Scenario: Making a successful booking
    Given there is a room available for £100 per night
    When I select an available room for 3 nights
    And I provide my payment details
    Then I should see my room is booked
    And my card has been charged £300

  Scenario: Cancelling a booking
    Given I already have an upcoming booking for 3 nights at £100 per night
    When I choose to cancel the booking
    Then I should see that the booking has been cancelled
    And my card has been refunded £300

  Scenario: Failing to make a booking
    Given there is a room available for £100 per night
    When I select an available room for 2 nights
    And I provide my payment details
    But the room fails to be booked
    Then I should see my room has not been reserved
    And that my card has not been charged
