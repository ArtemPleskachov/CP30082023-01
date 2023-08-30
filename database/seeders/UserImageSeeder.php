<?php

namespace Database\Seeders;

use App\Models\UserImage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserImageSeeder extends Seeder
{
	protected $faker;
	
	public function __construct()
	{
		$this->faker = Faker::create();
	}
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		$users = User::all();
		$totalImages = 100000;
		$imagesPerUser = 15;
	
		for ($i = 0; $i < $totalImages; $i++) {
			$user = $users->random();
			$user->images()->create(['image' => $this->faker->imageUrl()]);
		
			if ($user->images()->count() >= $imagesPerUser) {
				$users = $users->filter(function ($item) use ($user) {
					return $item->id !== $user->id;
				});
			}
		}
    }
}
