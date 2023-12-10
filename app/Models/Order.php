<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function view_products()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function view_users()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
