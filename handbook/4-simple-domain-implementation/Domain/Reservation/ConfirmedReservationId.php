<?php
declare(strict_types=1);

namespace Asgrim\Domain\Reservation;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class ConfirmedReservationId
{
    /** @var UuidInterface */
    private $id;

    private function __construct()
    {
    }

    public static function fromString(string $roomId) : self
    {
        $instance = new self();
        $instance->id = Uuid::fromString($roomId);
        return $instance;
    }

    public function __toString() : string
    {
        return $this->id->toString();
    }
}
