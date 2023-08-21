<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'long_description' => fake()->paragraph(7, true),
            'completed' => fake()->boolean(33)
        ];
    }
}
        // public int $id,
        // public string $title,
        // public string $description,
        // public ?string $long_description,
        // public bool $completed,
        // public string $created_at,
        // public string $updated_at