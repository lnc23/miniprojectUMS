<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;


class Item_penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota', 'kode_barang', 'qty'
    ];

    /**
     * Get the user that owns the Item_penjualan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

}
