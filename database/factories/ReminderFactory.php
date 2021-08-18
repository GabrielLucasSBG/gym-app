<?php

namespace Database\Factories;

use App\Models\Reminder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReminderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reminder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lead_id' => rand(1,10),
            'user_id' => rand(1,10),
            'reminder' => $this->faker->text(20),
            'note' => $this->faker->text(20),
            'status' => $this->faker-> word(),
            'reminder_date' => $this->faker->date(),
        ];
    }
}
