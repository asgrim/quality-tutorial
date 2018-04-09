<?php
declare(strict_types=1);

namespace AsgrimUnitTest\Domain\Booking;

use Asgrim\Domain\Booking\Booking;
use Asgrim\Domain\Booking\DateSelection;
use DateTimeImmutable;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

/**
 * Intentionally broken annotation:
 * covers \Asgrim\Domain\Booking\Booking
 */
final class BookingTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testFromSelectedDates() : void
    {
        $booking = Booking::fromSelectedDates(DateSelection::between(
            new DateTimeImmutable('now +2 days', new DateTimeZone('UTC')),
            new DateTimeImmutable('now +4 days', new DateTimeZone('UTC'))
        ));

        // stuff
    }
}
