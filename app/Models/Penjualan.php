<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item_penjualan;


class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl', 'kode_pelanggan', 'subtotal'
    ];

    public function itemPenjualan()
    {
        return $this->hasMany(Item_penjualan::class, 'nota', 'id_nota');
    }

    
}
