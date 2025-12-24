<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

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
        $title = str(fake()->sentence)->beforeLast('.')->title();

        return [
            'author_id' => User::factory(),
            'title' => $title,
            'slug' => $title->slug(),
            'content' => Collection::times(4, fn () => fake()->realText(600))->join(
                PHP_EOL.PHP_EOL
            ),
        ];
    }
}
