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

        $period = array(
            1,
            3,
            7,
            14,
            30
        );

        $typeTask = array(
            'link_product',
            'link_video',
            'page',
            'app'
        );

        $typePosition = array(
            'header',
            'sidebar',
            'content',
            'footer'
        );

        $rand_keys_task     = array_rand($typeTask, 1);
        $rand_keys_position = array_rand($typePosition, 1);
        $rand_keys_period   = array_rand($period, 1);

        return [
            'title'             => $this->faker->title(30),
            'description'       => $this->faker->text(300),
            'full_description'  => $this->faker->text(300),
            'category_id'       => Category::all()->random()->id,
            'user_id'           => User::all()->random()->id,
            'amount'            => mt_rand(5500, 50000),
            'sum_pay'           => mt_rand(5500, 50000),
            'type_task'         => $typeTask[$rand_keys_task],
            'type_position'     => $typePosition[$rand_keys_position],
            'site_count'        => mt_rand(1,10),
            'period'            => $period[$rand_keys_period],
            'views'             => mt_rand(1000, 9999),
            'status'            => mt_rand(0,1)
        ];
    }
}
