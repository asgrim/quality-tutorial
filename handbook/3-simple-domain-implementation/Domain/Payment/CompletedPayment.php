<?php
declare(strict_types=1);

namespace Asgrim\Domain\Payment;

final class CompletedPayment
{
    private $paymentId;

    private function __construct()
    {
    }

    public static function fromPendingPaymentAndPaymentResult(
        PendingPayment $pendingPayment,
        PaymentResult $someResult
    ) : self {
        $instance = new self();
        $instance->paymentId = $someResult->paymentId();
        return $instance;
    }
}
