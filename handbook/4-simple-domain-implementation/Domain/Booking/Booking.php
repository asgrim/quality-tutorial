<?php
declare(strict_types=1);

namespace Asgrim\Domain\Booking;

use Asgrim\Domain\Payment\CompletedPayment;
use Asgrim\Domain\Payment\PaymentGateway;
use Asgrim\Domain\Payment\PendingPayment;
use Asgrim\Domain\Reservation\ConfirmedReservationId;
use Asgrim\Domain\Reservation\Reservations;
use Assert\Assert;

final class Booking
{
    /** @var BookingId */
    private $id;

    /** @var DateSelection */
    private $dates;

    /** @var PendingPayment */
    private $pendingPayment;

    /** @var CompletedPayment */
    private $completedPayment;

    /** @var ConfirmedReservationId */
    private $confirmedReservationId;

    private function __construct()
    {
    }

    public static function fromSelectedDates(DateSelection $dates) : self
    {
        $instance = new self();
        $instance->id = BookingId::new();
        $instance->dates = $dates;
        return $instance;
    }

    public function preauthorisePayment(PaymentGateway $paymentGateway) : void
    {
        $this->pendingPayment = $paymentGateway->preauthorise($this);
    }

    public function reserveRoom(Reservations $reservations) : void
    {
        Assert::that($this->pendingPayment)->isInstanceOf(PendingPayment::class);
        $this->confirmedReservationId = $reservations->requestReservation($this->dates);
    }

    public function notifyCustomerAboutReservation() : void
    {
    }

    public function completePayment(PaymentGateway $paymentGateway) : void
    {
        Assert::that($this->pendingPayment)->isInstanceOf(PendingPayment::class);
        Assert::that($this->confirmedReservationId)->isInstanceOf(ConfirmedReservationId::class);
        $this->completedPayment = $paymentGateway->completePayment($this->pendingPayment);
    }
}
