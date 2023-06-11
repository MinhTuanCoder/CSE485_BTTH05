<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::inRandomOrder()->first();
        $author = Author::inRandomOrder()->first();
        return [
        'tieude' => $this->faker->sentence,
        'ten_bhat' => $this->faker->name,
        'ma_tloai' => $category->ma_tloai,
        'tomtat' => $this->faker->paragraph,
        'noidung' => $this->faker->text,
        'ma_tgia' => $author->ma_tgia,
        'hinhanh' => $this->faker->imageUrl(800, 600, 'nature'),
        'ngayviet' => $this->faker->dateTime(),
        ];
    }
}
