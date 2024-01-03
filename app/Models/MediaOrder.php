<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'mo_series_number',
        'id',
        'order_id',
        // 'client_id',
        // 'brand_id',
        // 'media_id',
        // 'tax_id',
        // 'agency_fee_id',
        // 'status_id',
        // 'project',
        // 'period_start',
        // 'period_end',
        // 'prepared',
        // 'revision',
        // 'date_revision',
    ];

    public function quotationM()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // public function taxMo()
    // {
    //     return $this->belongsTo(Tax::class, 'tax_id');
    // }

    // public function afMo()
    // {
    //     return $this->belongsTo(AgencyFee::class, 'agency_fee_id');
    // }

    // public function clientsMo()
    // {
    //     return $this->belongsTo(Client::class, 'client_id');
    // }

    // public function brandsMo()
    // {
    //     return $this->belongsTo(Brand::class, 'brand_id');
    // }

    // public function productsMo()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }

    // public function statusMo()
    // {
    //     return $this->belongsTo(Status::class, 'status_id');
    // }

    // public function mediaMo()
    // {
    //     return $this->belongsTo(Media::class, 'media_id');
    // }
    // public function quoteMo()
    // {
    //     return $this->hasMany(QuotationProduct::class, 'order_id');
    // }
}
