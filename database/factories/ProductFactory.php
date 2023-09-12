<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'store_id'=>Store::inRandomOrder()->first()->id,
            'category_id'=>Category::inRandomOrder()->first()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'notes'=>$this->faker->sentence(20),
            'price'=>  $this->faker->randomFloat(1,1,500),
            'compare_price'=>  $this->faker->randomFloat(1,500,999),
            'image' =>$this->faker->imageUrl(600*400),
            'product_material'=>$this->faker->name(),
            'manufacturer_company'=>$this->faker->name(),
            'quantity'=>$this->faker->numberBetween(1,50),
            'size'=>$this->faker->numberBetween(1,10),



        ];
    }
}
