<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
           'XXS', 'XS', 'S', 'M', 'L', 'XL'
        ];

        foreach ($sizes as $size){
            DB::table('sizes')->insert([
                'title' => $size,
                'value' => $size
            ]);
        }

        $sizes = Size::all();
        $product = Product::all();

        foreach ($sizes as $size){
            $size->product()->sync($product);
        }
    }
}
