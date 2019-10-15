<?php
declare(strict_types=1);

namespace AsgrimUnitTest\Domain\Booking;

use Asgrim\Domain\Booking\Booking;
use Asgrim\Domain\Booking\DateSelection;
use Asgrim\Domain\Payment\PaymentGateway;
use Asgrim\Domain\Payment\PendingPayment;
use Asgrim\Domain\Reservation\ConfirmedReservationId;
use Asgrim\Domain\Reservation\Reservations;
use DateTimeImmutable;
use DateTimeZone;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Intentionally broken annotation:
 * covers \Asgrim\Domain\Booking\Booking
 */
final class BookingTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCorrectDatesAreUsedWhenReservingARoom() : void
    {
        $paymentsSystem = $this->createMock(PaymentGateway::class);
        $reservationsSystem = $this->createMock(Reservations::class);

        $dateSelection = DateSelection::between(
            new DateTimeImmutable('now +2 days', new DateTimeZone('UTC')),
            new DateTimeImmutable('now +4 days', new DateTimeZone('UTC'))
        );
        $booking = Booking::fromSelectedDates($dateSelection);

        $paymentsSystem->expects(self::once())
            ->method('preauthorise')
            ->with($booking)
            ->willReturn(PendingPayment::new());

        $reservationsSystem->expects(self::once())
            ->method('requestReservation')
            ->with($dateSelection)
            ->willReturn(ConfirmedReservationId::fromString(Uuid::uuid4()->toString()));

        $booking->preauthorisePayment($paymentsSystem);
        $booking->reserveRoom($reservationsSystem);
    }
}
