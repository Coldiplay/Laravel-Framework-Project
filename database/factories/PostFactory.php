<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
        $categoryIds = Category::all()->pluck('id')->toArray();
        $userIds = User::all()->pluck('id')->toArray();
        $title = $this->faker->realTextBetween(10, 30);
        //$slug = str_replace(" ","-", $title);
        return [
            //
            'title' => $title,
            'slug' => $this->faker->slug(),
            'description' => $this->faker->realText(200),
            'content' => $this->faker->realTextBetween(250, 500),
            'category_id' => $this->faker->randomElement($categoryIds),
            'user_id' => (int)$this->faker->randomElement($userIds),
        ];
    }
}
