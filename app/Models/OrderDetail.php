<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'OrderDetails';
    protected $primaryKey = 'OrderDetailID';
    

    public function product(){
        return $this->belongsTo(Product::class,'ProductID');
    }
}
