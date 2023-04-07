<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Item_penjualan;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(){
        return Penjualan::all();
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
    
            $penjualanTable = Penjualan::create([
                "tgl" => $request->json('tgl'),
                "kode_pelanggan" => $request->json('kode_pelanggan'),
                "subtotal" => $request->json('subtotal'),
            ]);
    
            if (count($request->json('items')) > 0) {
                foreach ($request->json('items') as $item) {
                    $data2 = array(
                        "nota" => $penjualanTable->id,
                        "kode_barang" => $item['kode_barang'],
                        "qty" => $item['qty'],
                    );
                    Item_penjualan::create($data2);
                }
            }
    
            DB::commit();
    
            return response()->json([
                'message' => 'Penjualan Berhasil Tersinmpan',
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
    
            return response()->json([
                'message' => 'gagal tersimpan',
            ], 500);
        }
    }
}
