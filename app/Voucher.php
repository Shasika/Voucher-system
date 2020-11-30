<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'image', 'price', 'terms_conditions','validity_period','valid_till','created_role','is_approved','is_purchased'
    ];
}
