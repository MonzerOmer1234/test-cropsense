<?php

namespace App\Http\Controllers\FarmAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }



    /**
     * Deactivates a user by setting the deleted_at timestamp.
     *
     * @param int $userId The ID of the user to deactivate.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating success.
     */
    public function deactivateUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete(); // Soft delete

        return response()->json(['message' => 'User deactivated successfully']);
    }

    /**
     * Permanently deletes a user and their associated data.
     *
     * @param int $userId The ID of the user to delete.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating success.
     */
    public function deleteUser($userId)
    {
        $user = User::withTrashed()->findOrFail($userId);
        $user->forceDelete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
