<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyVoucher extends Model
{
    protected $fillable = [
        'image', 'price', 'terms_conditions','validity_period','valid_till','buyer_id'
    ];
}
