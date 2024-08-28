<?php

namespace App\Services;

use App\Models\Table;

class ReservationService
{
    public function getOneAvailableTable($date, $time, $endTime, $numberOfPeople) : ?Table
    {
        return Table::where('capacity', '>=', $numberOfPeople)
            ->whereDoesntHave('reservations', function ($query) use ($date, $time, $endTime) {
                $query->whereDate('date', $date)
                    ->where(function ($query) use ($endTime, $time) {
                        $query->whereTime('start_time', '<', $endTime);
                        $query->whereTime('end_time', '>', $time);
                    });
            })
            ->first();
    }
}
