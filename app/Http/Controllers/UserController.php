<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function createUser(Request $request): JsonResponse
	{
		$data = $request->validate([
			'name' => 'required|string',
			'city' => 'required|string',
		]);
		
		$user = User::create($data);
		
		return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
	}
	
	public function getUsers(): JsonResponse
	{
		$users = User::withCount('images')->orderByDesc('images_count')->get();
		
		return response()->json($users);
	}
	
	public function getUserById($id): JsonResponse
	{
		
		$user = User::withCount('images')->findOrFail($id);
		
		return response()->json($user);
	}
}
