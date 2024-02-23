<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = Color::factory(5)->create();
        $product = Product::all();

        foreach ($colors as $color){
            $color->product()->sync($product);
        }
    }
}
