<?php
declare(strict_types=1);

namespace Asgrim\Domain\Booking;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class BookingId
{
    /** @var UuidInterface */
    private $id;

    private function __construct()
    {
    }

    public static function fromString(string $bookingId) : self
    {
        $instance = new self();
        $instance->id = Uuid::fromString($bookingId);
        return $instance;
    }

    public static function new()
    {
        $instance = new self();
        $instance->id = Uuid::uuid4();
        return $instance;
    }

    public function __toString() : string
    {
        return $this->id->toString();
    }
}
