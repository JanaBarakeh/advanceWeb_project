<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tables/reserved",
     *     tags={"Tables"},
     *     summary="Returns reserved tables",
     *     description="This endpoint returns all tables that are currently reserved.",
     *     @OA\Response(
     *         response=200,
     *         description="List of all reserved tables",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="tables",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="details", type="string", example="near window"),
     *                     @OA\Property(property="capacity", type="integer", example=4)
     *                 )
     *             )
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
    public function getReservedTables(Request $request){
        // TODO: implement (staff)
    }

    /**
     * @OA\Get(
     *     path="/api/tables/available",
     *     tags={"Tables"},
     *     summary="Returns available tables (not currently reserved)",
     *     description="This endpoint returns all tables that are not currently reserved.",
     *     @OA\Response(
     *         response=200,
     *         description="List of all available tables",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="tables",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="details", type="string", example="near window"),
     *                     @OA\Property(property="capacity", type="integer", example=4)
     *                 )
     *             )
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
    public function getAvailableTables(Request $request){


    }
}
