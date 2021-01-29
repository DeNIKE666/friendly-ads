<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Site::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->title,
            'category_id' => Category::all()->random()->id,
            'user_id'     => User::all()->random()->id,
            'url'         => $this->faker->url,
            'short'       => $this->faker->text,
            'rating'      => mt_rand(1000, 1000),
            'activated'   => mt_rand(0,1),
        ];
    }
}
