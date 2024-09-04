<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }
    /**
     * @OA\Get(
     *     path="/api/Review",
     *     tags={"Review"},
     *     summary="Retrieve all Review",
     *     description="Fetches a list of all Review.",
     *     @OA\Response(
     *         response=200,
     *         description="List of all Review",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="reservation_id", type="integer", example=1),
     *                 @OA\Property(property="user_id", type="integer", example=1),
     *                 @OA\Property(property="rating", type="integer", example=5),
     *                 @OA\Property(property="content", type="string", example="Great service!")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Review::all();
    }

        /**
     * @OA\Post(
     *     path="/api/Review",
     *     summary="Create a new review",
     *     description="Allows users to create a new review by providing the reservation ID, user ID, rating, and optional content.",
     *     tags={"Review"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="reservation_id", type="integer", example=1, description="ID of the reservation"),
     *             @OA\Property(property="rating", type="integer", example=5, description="Rating given by the user"),
     *             @OA\Property(property="content", type="string", example="Great service!", description="Optional content of the review")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Review created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="reservation_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="rating", type="integer", example=5),
     *             @OA\Property(property="content", type="string", example="Great service!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Validation error"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'nullable|string',
        ]);

        $currentUser = User::find(Auth::user()->id);
        if ($currentUser->role_id != 3) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $review = Review::create([
            'reservation_id' => $request->reservation_id,
            'user_id' => Auth::id(), 
            'rating' => $request->rating,
            'content' => $request->content,
        ]);
        return response()->json($review, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/Review/{id}",
     *     tags={"Review"},
     *     summary="Retrieve a specific review",
     *     description="Fetches details of a specific review by its ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the review to retrieve",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Review details",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="reservation_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="rating", type="integer", example=5),
     *             @OA\Property(property="content", type="string", example="Great service!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Review not found")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);
        return response()->json($review);
    }

    /**
     * @OA\Put(
     *     path="/api/Review/{id}",
     *     tags={"Review"},
     *     summary="Update a review",
     *     description="Allows users to update the rating and content of an existing review.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the review to update",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="rating", type="integer", example=4, description="Updated rating"),
     *             @OA\Property(property="content", type="string", example="Good service!", description="Updated content")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Review updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="reservation_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="rating", type="integer", example=4),
     *             @OA\Property(property="content", type="string", example="Good service!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Validation error"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Review not found")
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $currentUser = User::find(Auth::user()->id);
        if ($currentUser->id != $review->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validatedData = $request->validate([
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'content' => 'nullable|string',
        ]);

        $review->update($validatedData);

        return response()->json($review);
    }

    /**
     * @OA\Delete(
     *     path="/api/Review/{id}",
     *     tags={"Review"},
     *     summary="Delete a review",
     *     description="Allows users to delete a specific review by its ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the review to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Review deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Review deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Review not found")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $currentUser = User::find(Auth::user()->id);
        if ($currentUser->id !== $review->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $review->delete();

        return response()->json(null, 204);
    }
}