<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $fack = \Faker\Factory::create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::create([
           'name'=>'Vegetables',
            'icon'=>'asset/img/icon/vegetable.png',
            'parent_id'=>null
        ]);
        $cat = Category::create([
            'name'=>'Fruits',
            'icon'=>'asset/img/icon/fruits.png',
            'parent_id'=>null
        ]);
        $cat2 = Category::create([
            'name'=>'Green Fruits',
            'icon'=>null,
            'parent_id'=>$cat->id
        ]);
        $cat3 = Category::create([
            'name'=>'Fresh Fruits',
            'icon'=>null,
            'parent_id'=>$cat2->id
        ]);
        Category::create([
            'name'=>'Groceries',
            'icon'=>'asset/img/icon/groceries.png',
            'parent_id'=>null
        ]);
        Category::create([
            'name'=>'Meat',
            'icon'=>'asset/img/icon/meat.png',
            'parent_id'=>null
        ]);
        Category::create([
            'name'=>'Fish',
            'icon'=>'asset/img/icon/fish.png',
            'parent_id'=>null
        ]);
        Category::create([
            'name'=>'Beverage',
            'icon'=>'asset/img/icon/bevarage.png',
            'parent_id'=>null
        ]);Category::create([
            'name'=>'Dry Food',
            'icon'=>'asset/img/icon/dry-food.png',
            'parent_id'=>null
        ]);

        $totalProduct = 8;
        while ($totalProduct > 0){
            Product::create([
                'name'=>'Product Name',
                'category_id'=>$cat3->id,
                'discount'=>100,
                'price'=>300,
                'description'=>$fack->text(200),
                'thumbnail_img'=>'asset/img/fruits/'.$totalProduct.'.png',
                'image_gallery'=>';'.'asset/img/vegetables/1.png'.
                    ';'.'asset/img/vegetables/2.png'.
                    ';'.'asset/img/vegetables/3.png'.
                    ';'.'asset/img/vegetables/4.png'.
                    ';'.'asset/img/vegetables/5.png'.
                    ';'.'asset/img/vegetables/6.png',
                'sku'=>'KE-'.$fack->numberBetween(99999,999999),
                'tags'=>'Food, Fruits, Vegetables',
            ]);
            $totalProduct --;
        }
    }
}
