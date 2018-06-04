<?php
declare(strict_types=1);

namespace AsgrimBehaviourTest;

use Asgrim\Domain\Booking\Booking;
use Asgrim\Domain\Booking\DateSelection;
use Asgrim\Domain\Payment\PaymentGateway;
use Asgrim\Domain\Reservation\Reservations;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use DateTimeImmutable;
use DateTimeZone;

final class BookHotelDomainContext implements Context
{
    /** @var PaymentGateway */
    private $paymentGateway;

    /** @var Reservations */
    private $reservations;

    /** @var DateSelection */
    private $selectedDates;

    /** @var Booking */
    private $booking;

    /**
     * @Given /^there is a room available for £(\d+) per night$/
     * @throws \Behat\Behat\Tester\Exception\PendingException
     */
    public function thereIsARoomAvailableForPerNight(int $roomRate) : void
    {
        // @todo make a room available in the external Reservations system
        throw new PendingException();
    }

    /**
     * @When /^I select an available room for (\d+) nights$/
     * @throws \Exception
     */
    public function iSelectAnAvailableRoomForNights(int $nightsCount) : void
    {
        $this->selectedDates = DateSelection::between(
            new DateTimeImmutable('now +1 day', new DateTimeZone('UTC')),
            new DateTimeImmutable(sprintf('now +%d days', $nightsCount + 1), new DateTimeZone('UTC'))
        );
        $this->booking = Booking::fromSelectedDates($this->selectedDates);
    }

    /**
     * @When /^I provide my payment details$/
     */
    public function iProvideMyPaymentDetails() : void
    {
        $this->booking->preauthorisePayment($this->paymentGateway);
        $this->booking->reserveRoom($this->reservations);
        $this->booking->completePayment($this->paymentGateway);
    }

    /**
     * @Then /^I should see my room is booked$/
     * @throws \Behat\Behat\Tester\Exception\PendingException
     */
    public function iShouldSeeMyRoomIsBooked() : void
    {
        // @todo check with the external Reservations system that the booking has been made
        throw new PendingException();
    }

    /**
     * @Then /^my card has been charged £(\d+)$/
     * @throws \Behat\Behat\Tester\Exception\PendingException
     */
    public function myCardHasBeenCharged(int $amount) : void
    {
        // @todo check with Stripe that the payment went through
        throw new PendingException();
    }
}
