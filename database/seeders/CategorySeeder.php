<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories=[
           [
            'name' => 't-shirt',
            'slug' => 't-shirt',
            'notes'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfPHvvZy6vGpYzl-viaXbbxQtDywMQ0yobYB060LlA4FJr6--usQGStHJ6r1_gfHN0LD8&usqp=CAU',
           ],
           [
            'name' => 'blouse',
            'slug' => 'blouse',
            'notes'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbdp2xNA13BDkZWuQhoYCfjmPPGoUxlRYmjfoY-n-DbG7SZYeTtlzV4DQxZgHcBxnfK-k&usqp=CAU',
           ],
           [
            'name' => 'Jeans',
            'slug' => 'Jeans',
            'notes'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration',
            'image'=>'https://images.boardriders.com/global/dcshoes-products/all/default/large/adydp03056_dcshoes,f_bsnw_frt1.jpg',
           ],
           [
            'name' => 'Saudi cloak',
            'slug' => 'saudi-cloak',
            'notes'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTr_0X8QWAU4ues_f4lEPybaeQFGxwLrXRmELFh3QeeeQon9EGASdoTAnGuLKQpBlE82e4&usqp=CAU',
           ],
           [
            'name' => 'Gym clothes',
            'slug' => 'gym-clothes',
            'notes'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5VGQPLZZyVH0QaPawN0aNJiSj8afrdsFN9WGkQAIAFyrk8DX6QJaIi8v7yfVdna59tcg&usqp=CAU',
           ],
           [
            'name' => 'Dress',
            'slug' => 'dress',
            'notes'=>'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSglXBRqHOAiOk6N0Mybp2RoqzcKc8Hd88F84tbXAMNkNDS5KUV5wn2HNO9xGJu05wgtVU&usqp=CAU',
           ],

           ];


           foreach($categories as $category){
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'notes'=>$category['notes'],
                'image'=>$category['image'],
            ]);
           }
    }
}

