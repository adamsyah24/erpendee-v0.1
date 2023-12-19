<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaOrder extends Model
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
}
