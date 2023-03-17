<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(40),
            'slug'  => Str::slug($this->faker->text(40)),
            'content' => $this->faker->realText(),
            'user_id' => User::all()->random()->id,
            'status' => $this->faker->randomElement(['pending', 'publish'])
        ];
    }
}
