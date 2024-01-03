<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_fee',
    ];

    public function moAf()
    {
        return $this->hasMany(MediaOrder::class, 'agency_fee_id');
    }

    public function quotationAf()
    {
        return $this->hasMany(Order::class, 'agency_fee_id');
    }
}
