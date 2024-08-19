<?php
namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Reviews::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'nullable|string',
        ]);
        $review = Reviews::create($validatedData);
        return response()->json($review, 201);
    }

    public function show($id)
    {
        $review = Reviews::findOrFail($id);
        return response()->json($review);
    }

    public function update(Request $request, $id)
    {
        $review = Reviews::findOrFail($id);

        $validatedData = $request->validate([
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'content' => 'nullable|string',
        ]);

        $review->update($validatedData);

        return response()->json($review);
    }

    public function destroy($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return response()->json(null, 204);
    }
}
