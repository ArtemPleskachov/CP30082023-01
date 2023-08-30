<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
	protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'name' => $this->faker->name,
			'city' => $this->faker->city,
		];
    }
	
	public function configure(): UserFactory
	{
		
		return $this->afterCreating(function (User $user) {
			$user->images()->saveMany(UserImage::factory(random_int(1, 5))->make());
		});
	}
}
