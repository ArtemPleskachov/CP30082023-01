<?php

namespace Database\Factories;

use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserImage>
 */
class UserImageFactory extends Factory
{
	protected $model = UserImage::class;
	
	private static $remainingImages = 100000;
	
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$numberOfImages = rand(0, min(self::$remainingImages, 10));
		self::$remainingImages -= $numberOfImages;
	
		return [
			'image' => $this->faker->imageUrl(),
			'user_id' => null,
			'images_count' => $numberOfImages,
		];
    }
}
