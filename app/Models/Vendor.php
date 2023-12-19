<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pt_vendor',
        'nama_vendor',
        'jenis_vendor',
        'pic_vendor',
        'nama_contact_person',
        'nohp_contact_person',
        'link_dokumen',
    ];
}
