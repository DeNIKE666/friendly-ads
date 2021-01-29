<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'           => $this->faker->title,
            'description'     => $this->faker->text,
            'category_id'     => Category::all()->random()->id,
            'user_id'         => User::all()->random()->id,
            'amount'          => mt_rand(5500, 50000),
            'type_task'       => 'link_video',
            'type_position'   => 'sidebar',
            'site_count'      => mt_rand(10,50),
            'period'          => mt_rand(1,30),
            'views'           => mt_rand(1000, 9999)
        ];
    }
}
