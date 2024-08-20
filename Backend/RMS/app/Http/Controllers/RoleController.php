<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/roles",
     *     tags={"Roles"},
     *     summary="Create a new role",
     *     description="Creates a new role with the specified name.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Admin", description="The name of the role")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Role created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Role created successfully"),
     *             @OA\Property(property="role", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Admin"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-08-20T12:34:56.789Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-08-20T12:34:56.789Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=409,
     *         description="Role already exists",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Role already exists.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The name field is required.")
     *         )
     *     )
     * )
     */
    public function CraeteRole(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        // التحقق من وجود الدور مسبقاً
        $existingRole = Role::where('name', $validatedData['name'])->first();
        if ($existingRole) {
            return response()->json(['message' => 'Role already exists.'], 409);
        }

        // إنشاء الدور الجديد
        $role = Role::create([
            'name' => $validatedData['name'],
        ]);
        
        // إرجاع استجابة مناسبة
        return response()->json(['message' => 'Role created successfully', 'role' => $role], 201);
    }
}
