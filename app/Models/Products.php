<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'box_id',
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    /*public function boxes()
    {
        return $this->belongsTo(Boxes::class);
    }*/

    public function images()
    {
        return $this->hasMany(ProductsImages::class);
    }

    public function getDefaultImaage()
    {
        return $this->images()->where('is-default', true)->first() ?? $this->images()->first();
    }
}
