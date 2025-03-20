<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    /**
     * Les champs qui peuvent être remplis de manière massive.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image_path',
    ];

    /**
     * Relation 1:N avec la table products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Relation 1:N avec la table boxes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /* public function boxes()
    {
        return $this->hasMany(Box::class);
    } */
}
