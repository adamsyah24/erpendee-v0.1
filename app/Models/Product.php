<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_desc',
        'price'
    ];


    public function pOrder()
    {
        return $this->hasOne(Order::class, 'product_id');
    }

    public function pQuote()
    {
        return $this->hasMany(QuotationProduct::class, 'product_id');
    }

    public function moProduct()
    {
        return $this->hasMany(MediaOrder::class, 'product_id');
    }
}
