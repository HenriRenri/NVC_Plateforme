<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductsImages extends Model
{
    use HasFactory;

    protected $table = 'products_images';

    protected $fillable = [
        'product_id',
        'image_url',
        'image_type',
        'image_size',
        'is_default'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function setAsDefault()
    {
        self::where('product_id', $this->product_id)->update(['is_default' => false]);

        $this->is_default = true;
        $this->save();

        return $this;
    }
}
