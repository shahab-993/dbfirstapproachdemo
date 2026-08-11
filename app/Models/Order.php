<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table ='Orders';
   protected $primaryKey ='OrderID';



   public function customer(){
    return $this->belongsTo(Customer::class,'CustomerID');

   }
   public function orderDetials(){
    return $this->hasMany(OrderDetail::class,'OrderID');
   }
}

