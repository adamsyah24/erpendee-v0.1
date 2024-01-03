<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'media_name',
        'media_desc',
    ];

    public function oMedia()
    {
        return $this->hasMany(Order::class, 'media_id');
    }

    public function moMedia()
    {
        return $this->hasMany(MediaOrder::class, 'media_id');
    }
}
