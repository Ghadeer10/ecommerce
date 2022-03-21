<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Lg mobile',
                'price' => 100,
                'description' => 'smart phone bla bla bla bla',
                'category' => "mobile",
                'gallery' => 'https://i.ebayimg.com/images/i/252364034559-0-1/s-l1000.jpg'
            ],
            [
                'name' => 'oppo mobile',
                'price' => 150,
                'description' => 'smart phone bla bla bla bla',
                'category' => "mobile",
                'gallery' => 'https://klgadgetguy.com/wp-content/uploads/2019/05/OPPO-K3-2.jpg'
            ],
            [
                'name' => 'panasonice TV',
                'price' => 400,
                'description' => 'smart TV with bla bla bla bla features',
                'category' => "tv",
                'gallery' => 'https://www.cybertek.fr/images_produits/fb88292e-a595-4052-8283-c6c405a6d4d8.jpg'
            ],
            [
                'name' => 'sony tv',
                'price' => 500,
                'description' => 'smart TV with bla bla bla bla feature',
                'category' => "tv",
                'gallery' => 'https://www.electrofarm.co.uk/wp-content/uploads/2020/09/91coU9OAnAL._AC_SL1500_.jpg'
            ],
            [
                'name' => 'Lg fridge',
                'price' => 100,
                'description' => 'smart fridge bla bla bla bla',
                'category' => "fridge",
                'gallery' => 'https://www.harveynorman.com.au/blog/assets/LG-910-Litre-InstaView-Fridge.jpg'
            ],

        ]);
    }
}
