<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Item_penjualan;

class PenjualanController extends Controller
{
    public function index(){
        return Penjualan::all();
    }

    public function create(Request $request){
        return Penjualan::create([
            'tgl' => $request->json('tgl'),
            'kode_pelanggan' => $request->json('kode_pelanggan'),
            'subtotal' => $request->json('subtotal'), 
            'item' => [
                    'kode_barang' => $request->json('kode_barang'),
                    'qty' => $request->json('qty'),  
                ]
        ]);
        // return Item_penjualan:: create([
        //     'nota' => $request->tgl,
        //     'kode_barang' => $request->kode_barang,
        //     'qty' => $request->qty
        // ])
    }
}
