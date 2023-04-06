<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota', 'kode_pelanggan', 'qty'
    ];
}
