<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namapelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pelanggan', 'no_tlp', 'alamat'
    ];
}
