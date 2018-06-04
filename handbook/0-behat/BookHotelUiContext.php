<?php
declare(strict_types=1);

namespace AsgrimBehaviourTest;

use Assert\Assert;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\RawMinkContext;
use DateTimeImmutable;
use DateTimeZone;

final class BookHotelUiContext extends RawMinkContext
{
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
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     * @throws \Exception
     */
    public function iSelectAnAvailableRoomForNights($nightsCount) : void
    {
        $session = $this->getSession();
        $page = $session->getPage();

        $session->visit('/select-dates');
        $page->fillField(
            '.check-in-date',
            (new DateTimeImmutable('now +1 day', new DateTimeZone('UTC')))->format('d/m/Y')
        );
        $page->fillField(
            '.check-out-date',
            (new DateTimeImmutable(sprintf('now +%d days', $nightsCount + 1), new DateTimeZone('UTC')))->format('d/m/Y')
        );
        $page->pressButton('.next');
    }

    /**
     * @Given /^I provide my payment details$/
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function iProvideMyPaymentDetails() : void
    {
        $session = $this->getSession();
        $page = $session->getPage();

        Assert::that($session->getCurrentUrl())->endsWith('/credit-card-payment');

        $page->fillField('Credit Card Number', '4242424242424242');
        $page->fillField('Expiry Date', '01/19');
        $page->fillField('CCV (three digits from the back)', '123');
        $page->pressButton('.next');
    }

    /**
     * @Then /^I should see my room is booked$/
     * @throws \Behat\Behat\Tester\Exception\PendingException
     */
    public function iShouldSeeMyRoomIsBooked() : void
    {
        $page = $this->getSession()->getPage();

        $page->hasContent('your booking has been confirmed');
        $page->has('.booking-ref', 'css');

        // @todo check with the external Reservations system that the booking has been made
    }

    /**
     * @Then /^my card has been charged £(\d+)$/
     * @throws \Behat\Behat\Tester\Exception\PendingException
     */
    public function myCardHasBeenCharged(int $amount) : void
    {
        $page = $this->getSession()->getPage();

        Assert::that($page->find('.receipt-total', 'css')->getText())->contains('300');

        // @todo check with Stripe that the payment went through
    }
}
