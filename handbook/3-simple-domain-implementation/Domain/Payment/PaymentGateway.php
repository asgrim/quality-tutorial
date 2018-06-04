<?php
declare(strict_types=1);

namespace Asgrim\Domain\Payment;

use Asgrim\Domain\Booking\Booking;

interface PaymentGateway
{
    public function preauthorise(Booking $booking) : PendingPayment;

    public function completePayment(PendingPayment $pendingPayment) : CompletedPayment;
}
