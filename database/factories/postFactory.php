<?php

namespace Database\Factories;

use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    protected $model= post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->realText(15),
            'body'=> $this->faker->realText(100),
            'author'=>$this->faker->name,
           'created_at' => now(),
           'updated_at' => now()
        ];
    }
}
