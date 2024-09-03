<?php

namespace App\Enums;

enum ReservationStatus: int
{
    case PENDING = 0;
    case CANCELLED = 1;
    case COMPLETED = 2;
    case STARTED = 3;
}
