<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function CraeteRole(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        // إنشاء الدور الجديد
        $role = Role::create([
            'name' => $validatedData['name'],
        ]);
        
        // إرجاع استجابة مناسبة
        return response()->json(['message' => 'Role created successfully', 'role' => $role], 201);
    }
}
