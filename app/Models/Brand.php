<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function oBrand()
    {
        return $this->hasOne(Order::class, 'brand_id');
    }

    protected $fillable = [
        'client_id',
        'brand_name',
        'brand_slug',
    ];
}
