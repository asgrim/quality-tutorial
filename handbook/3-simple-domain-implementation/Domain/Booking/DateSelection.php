<?php
declare(strict_types=1);

namespace Asgrim\Domain\Booking;

use Assert\Assert;
use DateTimeImmutable;
use DateTimeZone;

final class DateSelection
{
    /** @var DateTimeImmutable */
    private $checkIn;

    /** @var DateTimeImmutable */
    private $checkOut;

    private function __construct()
    {
    }

    public static function between(DateTimeImmutable $checkIn, DateTimeImmutable $checkOut) : self
    {
        // @todo ideally convert these to UTC if not already - should not simply be an assumption.
        $instance = new self();
        $instance->checkIn = $checkIn;
        $instance->checkOut = $checkOut;
        return $instance;
    }

    /**
     * @param string[] $data
     * @return DateSelection
     * @throws \Exception
     */
    public static function fromArray(array $data) : self
    {
        Assert::that($data)->keyExists('checkIn');

        $instance = new self();
        $instance->checkIn = new DateTimeImmutable($data['checkIn'], new DateTimeZone('UTC'));
        $instance->checkOut = new DateTimeImmutable($data['checkIn'], new DateTimeZone('UTC'));
        return $instance;
    }

    public function checkIn() : DateTimeImmutable
    {
        return $this->checkIn;
    }

    public function checkOut() : DateTimeImmutable
    {
        return $this->checkIn;
    }

    public function toArray() : array
    {
        return [
            'checkIn' => $this->checkIn->format('r'),
            'checkOut' => $this->checkIn->format('r'),
        ];
    }
}
