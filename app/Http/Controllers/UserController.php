<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
	
	public function getUsers(): JsonResponse
	{
		$users = User::withCount('images')
			->orderBy('images_count')
			->orderByDesc('created_at', 'asc')
			->get();
		
		return response()->json($users);
	}
	
	
	public function createUserWithImage(Request $request): JsonResponse
	{
		$request->validate([
			'name' => 'required|string',
			'city' => 'required|string',
			'images' => 'required|array',
			'images.*' => 'image|mimes:jpeg,png',
		]);
		
		$user = User::create([
			'name' => $request->name,
			'city' => $request->city,
		]);
		
		if ($request->hasFile('images')) {
			foreach ($request->file('images') as $image) {
				$imagePath = $image->store('user_images', 'public');
				
				UserImage::create([
					'image' => $imagePath,
					'user_id' => $user->id,
				]);
			}
		}
		
		return response()->json(['message' => 'User created successfully'], 201);
	}
	
	public function createUserWithImageString(Request $request): JsonResponse
	{
		$request->validate([
			'name' => 'required|string',
			'city' => 'required|string',
			'image' => 'required|string',
		]);
		
		$user = User::create([
			'name' => $request->name,
			'city' => $request->city,
		]);
		
		if ($request->hasFile('image')) {
			$imagePath = $request->file('image')->store('user_images', 'public');
			
			UserImage::create([
				'image' => $imagePath,
				'user_id' => $user->id,
			]);
		}
		
		return response()->json(['message' => 'User created successfully'], 201);
	}
}
