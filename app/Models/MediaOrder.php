<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'mo_series_number',
    ];

    public function quotationM()
    {
        return $this->hasMany(Order::class, 'order_no');
    }

    public function taxMo()
    {
        return $this->hasMany(Tax::class, 'order_no');
    }

    public function afMo()
    {
        return $this->hasMany(AgencyFee::class, 'order_no');
    }
}
