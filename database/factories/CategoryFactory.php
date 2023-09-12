<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'notes'=>$this->faker->sentence(20),
            //'parent_id'=>Category::inRandomOrder()->first()->id,
            'image' =>$this->faker->imageUrl(600*400),
        ];
    }
}
