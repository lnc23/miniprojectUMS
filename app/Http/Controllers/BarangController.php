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
        $data = Barang::create([
            'nama' => $request->json('nama'),
            'kategori' => $request->json('kategori'),
            'harga' => $request->json('harga'),
            'warna' => $request->json('warna')
        ]);
        
        if($data){
            return response()->json(["Message" => 'success', "data" => [$data]]);
        } else {
            return response()->json(["Message" => 'gagal']);
        }
    }

    public function update(Request $request){
        $data = Barang::where('kode', $request->kode)->update([
            'nama' => $request->json('nama'),
            'kategori' => $request->json('kategori'),
            'harga' => $request->json('harga'),
            'warna' => $request->json('warna')
        ]);

        if($data > 0){
            return response()->json(["Message" => 'success', "Detail" => "data barang $request->kode berhasil didelete"]);
        } else {
            return response()->json(["Message" => 'gagal']);
        }

    }

    public function delete(Request $request){
        $data = Barang::where('kode', $request->kode)->delete();
        if ($data > 0) {
            return response()->json(["Message" => 'success', "Detail" => "Data barang $request->kode berhasil didelete"]);
        } else {
            return response()->json(["Message" => 'gagal', "Detail" => 'Data barang gagal didelete']);
        }
    }
}
