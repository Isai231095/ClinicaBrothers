<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function assignRole($userId, $roleName)
    {
        $user = User::find($userId);
        if ($user) {
            $user->assignRole($roleName);
            return response()->json(['message' => 'Role assigned successfully.']);
        }
        return response()->json(['message' => 'User not found.'], 404);
    }
}
