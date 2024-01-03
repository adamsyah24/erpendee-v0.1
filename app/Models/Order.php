<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'order_no',
        'order_series',
        'media_order_id',
        'client_id',
        'brand_id',
        'media_id',
        'tax_id',
        'agency_fee_id',
        'status_id',
        'project',
        'period_start',
        'period_end',
        'prepared',
        'revision',
        'date_revision',
        'tax',
        'file_path',
    ];

    public function mediaOrder()
    {
        return $this->hasMany(MediaOrder::class, 'order_id');
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

    public function taxOrder()
    {
        return $this->belongsTo(Tax::class, 'tax_id');
    }

    public function afO()
    {
        return $this->belongsTo(AgencyFee::class, 'agency_fee_id');
    }
}
