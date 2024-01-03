<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'remarks',
        'periodstart',
        'periodend',
        'qty',
        'priced',
        'freq',

    ];


    // public function qOrder()
    // {
    //     return $this->belongsTo(Order::class, 'order_id');
    // }


    public function qProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
