<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/reservations/",
     *     tags={"Reservations"},
     *     summary="Create a new reservation",
     *     description="This endpoint creates a new reservation for a table based on the provided date, time, and capacity.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="date", type="string", format="date", example="2024-08-23"),
     *             @OA\Property(property="time", type="string", format="time", example="19:00"),
     *             @OA\Property(property="capacity", type="integer", example=4)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Reservation successfully created",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="tableId", type="integer", example=1),
     *             @OA\Property(property="date", type="string", format="date", example="2024-08-23"),
     *             @OA\Property(property="time", type="string", format="time", example="19:00"),
     *             @OA\Property(property="resId", type="integer", example=123),
     *             @OA\Property(property="status", type="string", example="confirmed")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request, invalid input",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Invalid input data")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function reserveTable(Request $request){

    }

    /**
     * @OA\Get(
     *     path="/api/reservations",
     *     tags={"Reservations"},
     *     summary="Retrieve reservations for a specific date",
     *     description="This endpoint returns a list of reservations for the specified date.",
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         required=true,
     *         description="Date to filter reservations",
     *         @OA\Schema(
     *             type="string",
     *             format="date",
     *             example="2024-08-23"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of reservations for the specified date",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="reservations",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="resId", type="integer", example=123),
     *                     @OA\Property(property="tableId", type="integer", example=1),
     *                     @OA\Property(property="date", type="string", format="date", example="2024-08-23"),
     *                     @OA\Property(property="time", type="string", format="time", example="19:00"),
     *                     @OA\Property(property="endTime", type="string", format="time", example="19:00"),
     *                     @OA\Property(property="actualEndTime", type="string", format="time", example="21:00"),
     *                     @OA\Property(property="status", type="string", example="Confirmed")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request, invalid date parameter",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Invalid date parameter")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function getReservations(Request $request)
    {

    }

    /**
     * @OA\Get(
     *     path="/api/reservations/availability",
     *     tags={"Reservations"},
     *     summary="Check table availability for a specific date, time, and capacity",
     *     description="This endpoint checks if there are tables available for a given date, time, and capacity. It also provides alternative times if no tables are available.",
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         required=true,
     *         description="Date for which to check availability",
     *         @OA\Schema(
     *             type="string",
     *             format="date",
     *             example="2024-08-23"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="capacity",
     *         in="query",
     *         required=true,
     *         description="Required capacity for the reservation",
     *         @OA\Schema(
     *             type="integer",
     *             example=4
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="time",
     *         in="query",
     *         required=true,
     *         description="Time for which to check availability",
     *         @OA\Schema(
     *             type="string",
     *             format="time",
     *             example="19:00"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Availability status and alternative times",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="isAvailable", type="boolean", example=true),
     *             @OA\Property(
     *                 property="otherTimes",
     *                 type="array",
     *                 @OA\Items(
     *                     type="string",
     *                     format="time",
     *                     example="20:00"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request, invalid input parameters",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Invalid input parameters")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function getAvailability(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'numberOfPeople' => 'required|integer|min:1|max:200',
        ]);

        $date = Carbon::createFromFormat('Y-m-d', $validatedData['date']);
        $time = Carbon::createFromFormat('H:i', $validatedData['time']);
        $numberOfPeople = $validatedData['numberOfPeople'];

        $time->setMinutes($time->minute < 30 ? 0 : 30)->setSeconds(0);
        $endTime = $time->addHours(2)->format('H:i');

        return Table::where('capacity', '>=', $numberOfPeople)
            ->whereDoesntHave('reservations', function ($query) use ($date, $time, $endTime) {
                $query->whereDate('date', $date)
                    ->where(function ($query) use ($endTime, $time) {
                        $query->whereTime('start_time', '<', $endTime);
                        $query->whereTime('end_time', '>', $time);
                    });
            })
            ->get();

    }

    /**
     * @OA\Get(
     *     path="/api/user/reservations/",
     *     tags={"Reservations"},
     *     summary="Get a list of reservations for the logged-in user",
     *     description="This endpoint returns a list of reservations made by the logged-in user.",
     *     @OA\Response(
     *         response=200,
     *         description="List of reservations for the logged-in user",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="reservations",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="resId", type="integer", example=123),
     *                     @OA\Property(property="tableId", type="integer", example=1),
     *                     @OA\Property(property="date", type="string", format="date", example="2024-08-23"),
     *                     @OA\Property(property="time", type="string", format="time", example="19:00"),
     *                     @OA\Property(property="status", type="string", example="Confirmed")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized, user not logged in",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Unauthorized access")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function getUserReservations(Request $request)
    {

    }

    /**
     * @OA\Delete(
     *     path="/api/reservations/{resId}/",
     *     tags={"Reservations"},
     *     summary="Cancel an existing reservation",
     *     description="This endpoint cancels an existing reservation identified by the provided reservation ID.",
     *     @OA\Parameter(
     *         name="resId",
     *         in="path",
     *         required=true,
     *         description="ID of the reservation to be canceled",
     *         @OA\Schema(
     *             type="integer",
     *             example=123
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reservation successfully canceled",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="resId", type="integer", example=123),
     *             @OA\Property(property="status", type="string", example="Cancelled")
     *         )
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="No permissions",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="No permissions to cancel this reservation")
     *          )
     *      ),
     *     @OA\Response(
     *         response=404,
     *         description="Reservation not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Reservation not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function cancelReservation(Request $request)
    {

    }
}
