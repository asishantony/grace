<?php

namespace Database\Factories;

use App\Models\NewsEvents;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsEventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsEvents::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        return [
        'heading' => $this->faker->title(),
        'content' => $this->faker->paragraph(),
        'priority' => $number++,
        'due_date' => $this->faker->date(),

        ];
    }
}
