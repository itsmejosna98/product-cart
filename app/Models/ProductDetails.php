<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    public function view_products()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
