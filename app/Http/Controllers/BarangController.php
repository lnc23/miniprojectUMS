<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        return Barang::all();
    }

    public function create(Request $request){
        return Barang::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga
        ]);
    }

    public function update(Request $request){
        return Barang::where('kode', $request->kode)->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga
        ]);
    }

    public function delete(Request $request){
        return Barang::where('kode', $request->kode)->delete();
    }
}
