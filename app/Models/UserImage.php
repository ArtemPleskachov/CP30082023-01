<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserImage extends Model
{
	protected $fillable = ['user_id', 'image'];
	
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}