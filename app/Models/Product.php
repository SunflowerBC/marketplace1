<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function color()
    {
        return $this->belongsToMany(Color::class, "product_color");
    }
    public function size()
    {
        return $this->belongsToMany(Size::class, "product_size");
    }
    public function order()
    {
        return $this->belongsToMany(Order::class, "product_order");
    }
}
