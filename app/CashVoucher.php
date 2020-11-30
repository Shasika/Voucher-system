<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashVoucher extends Model
{
    protected $fillable = [
        'image', 'price','validity_period','valid_till','created_role','created_by','is_purchased'
    ];
}
