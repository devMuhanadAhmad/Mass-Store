<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
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
            'image' =>$this->faker->imageUrl(600*400),
        ];
    }
}
