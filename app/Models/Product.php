<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = [];

    public $timestamps = true;

    public function attributesValue()
    {
        return $this->belongsToMany(AttributeValue::class, 'attributes')->withTimestamps();
    }

    public function productPricing()
    {
        return $this->hasMany(ProductPricing::class);
    }
}
