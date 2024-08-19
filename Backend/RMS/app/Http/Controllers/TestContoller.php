<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="My Laravel API",
 *     version="1.0.0",
 *     description="This is the API documentation for My Laravel Project."
 * )
 * @OA\Server(
 *     url="http://127.0.0.1:8000/api",
 *     description="API Server"
 * )
 */
class TestContoller extends Controller
{
    /**
     * @OA\Get(
     *     path="/testadfdfgfdgf a adsfgadft aefgerg dfaa",
     *     summary="Get a list of tests",
     *     tags={"Users"},
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
    public function test(){
        return "hihihihi";
    }
}
