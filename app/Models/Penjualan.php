<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ItemPenjualanController;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl', 'kode_pelanggan', 'subtotal'
    ];
}
