<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

     protected $fillable = [
        'box_id',
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'is_active',
    ];

     public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }

    /*public function box()
    {
        return $this->belongsTo(Boxes::class);
    } */

     public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
