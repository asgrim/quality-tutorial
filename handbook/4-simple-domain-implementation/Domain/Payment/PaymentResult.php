<?php
declare(strict_types=1);

namespace Asgrim\Domain\Payment;

interface PaymentResult
{
    public function paymentId() : string;
}
