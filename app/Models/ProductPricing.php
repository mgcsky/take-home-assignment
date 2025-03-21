<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPricing extends Model
{
    protected $table = 'product_pricing';

    protected $guarded = [];

    public $timestamps = true;

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function rentalPeriod()
    {
        return $this->belongsTo(RentalPeriod::class);
    }
}
