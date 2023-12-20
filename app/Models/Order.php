<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'order_series',
        'client_id',
        'brand_id',
        'media_id',
        'status_id',
        'project',
        'period_start',
        'period_end',
        'prepared',
        'revision',
        'date_revision',
        'tax',
    ];

    public function mediaOrder()
    {
        return $this->belongsTo(MediaOrder::class, 'order_no');
    }

    public function clientsO()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function brandsO()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productsO()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function statusO()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function mediaO()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function oQuote()
    {
        return $this->hasMany(QuotationProduct::class, 'order_id');
    }

}
