<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyCashVoucher extends Model
{
    protected $fillable = [
        'image', 'price','validity_period','valid_till','buyer_id'
    ];
}
