<?php

namespace App\Http\Controllers;

use App\Models\UserImage;
use Illuminate\Http\Request;

class UserImageController extends Controller
{
	public function createImage(Request $request)
	{
		$data = $request->validate([
			'user_id' => 'required|exists:users,id',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif',
		]);
		
		$image = new UserImage();
		$image->image = $request->file('image')->store('user_images');
		$image->user_id = $data['user_id'];
		$image->save();
		
		return response()->json(['message' => 'Image created successfully', 'image' => $image], 201);
	}
}
