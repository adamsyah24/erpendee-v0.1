<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = [
        'vat_tax',
    ];

    public function moTax()
    {
        return $this->belongsTo(MediaOrder::class, 'tax_id');
    }

    public function quotationTax()
    {
        return $this->belongsTo(MediaOrder::class, 'tax_id');
    }
}
