<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index(){
        return Pelanggan::all();      
    }

    public function create(Request $request){
        return Pelanggan::create([
            'nama' => $request->nama,
            'domisili' => $request->domisili,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
    }

    public function update(Request $request){
        return Pelanggan::where('id_pelanggan', $request->id_pelanggan)->update([
            'nama' => $request->nama,
            'domisili' => $request->domisili,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
    }

    public function delete(Request $request){
        return Pelanggan::where('id_pelanggan', $request->id_pelanggan)->delete();
    }
}