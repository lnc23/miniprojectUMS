<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index(){
        $data = Pelanggan::all();

        if($data){
            return response()->json(["Message" => 'success', "data" => $data]);
        } else {
            return response()->json(["Message" => 'gagal']);
        }
        
    }

    public function create(Request $request){
        $data = Pelanggan::create([
            'nama' => $request->json('nama'),
            'domisili' => $request->json('domisili'),
            'jenis_kelamin' => $request->json('jenis_kelamin')
        ]);

        if($data){
            return response()->json(["Message" => 'success', "data" => $data]);
        } else {
            return response()->json(["Message" => 'gagal']);
        }
    }

    public function update(Request $request){
        $data = Pelanggan::where('id_pelanggan', $request->id_pelanggan)->update([
            'nama' => $request->json('nama'),
            'domisili' => $request->json('domisili'),
            'jenis_kelamin' => $request->json('jenis_kelamin')
        ]);
        if ($data > 0) {
            return response()->json(["Message" => 'success', "Detail" => "Data pelanggan $request->id_pelanggan berhasil diupdate"]);
        } else {
            return response()->json(["Message" => 'gagal', "Detail" => 'Data pelanggan gagal diupdate']);
        }
    }

    public function delete(Request $request){
        $data = Pelanggan::where('id_pelanggan', $request->id_pelanggan)->delete();
        if ($data > 0) {
            return response()->json(["Message" => 'success', "Detail" => "Data pelanggan $request->id_pelanggan berhasil didelete"]);
        } else {
            return response()->json(["Message" => 'gagal', "Detail" => 'Data pelanggan gagal didelete']);
        }
    }
}