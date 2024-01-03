<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function brands()
    {
        return $this->hasMany(Brand::class, 'client_id');
    }

    public function oClient()
    {
        return $this->hasMany(Order::class, 'client_id');
    }
    public function moClient()
    {
        return $this->hasMany(MediaOrder::class, 'client_id');
    }
    protected $fillable = [
        'client_name',
        'client_slug',
        'address'
    ];
}
