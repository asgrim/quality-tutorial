<?php
declare(strict_types=1);

namespace Asgrim\Domain\Reservation;

use Asgrim\Domain\Booking\DateSelection;

interface Reservations
{
    public function requestReservation(DateSelection $dateSelection) : ConfirmedReservationId;

    public function cancelReservation(ConfirmedReservationId $confirmedReservationId) : void;
}
