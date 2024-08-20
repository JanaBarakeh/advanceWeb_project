<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;


class TestContoller extends Controller
{
    /**
     * @OA\Get(
     *     path="/testadfdfgfdgf a adsfgadft aefgerg dfaa",
     *     summary="Get a list of tests",
     *     tags={"Test"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid request"
     *     )
     * )
     */
    public function test()
    {
        return "hihihihi";
    }
}
