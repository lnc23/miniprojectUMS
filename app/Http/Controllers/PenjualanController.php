<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Item_penjualan;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(){
    $penjualans = Penjualan::with('itemPenjualan')->get();
    return $penjualans;
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
                'message' => 'Penjualan Berhasil Tersimpan',
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
    
            return response()->json([
                'message' => 'gagal tersimpan',
            ], 500);
        }
    }

    public function update(Request $request){
        {
            try {
                DB::beginTransaction();
        
                $penjualanTable = Penjualan::where('id_nota', $request->id_nota)->update([
                    "tgl" => $request->json('tgl'),
                    "kode_pelanggan" => $request->json('kode_pelanggan'),
                    "subtotal" => $request->json('subtotal'),
                ]);

                foreach ($request->json('items') as $item) {
                    $data2 = array(
                        "kode_barang" => $item['kode_barang'],
                        "qty" => $item['qty'],
                    );
                    Item_penjualan::where('id_item', $item['id_item'])->where('nota', $request->id_nota)->update($data2);
                }
        
                DB::commit();
        
                return response()->json([
                    'message' => 'Penjualan Berhasil Diupdate',
                ], 200);
            } catch (\Exception $e) {
                DB::rollback();
        
                return response()->json([
                    'message' => "gagal update",
                ], 500);
            }
        }
    }
    
    public function delete(Request $request){
        $itemPenjualan = Item_penjualan::where('nota', $request->id_nota)->delete();
        if($itemPenjualan > 0){
            $penjualan = Penjualan::where('id_nota', $request->id_nota)->delete();
        }
        if ($penjualan > 0 && $itemPenjualan > 0) {
            return response()->json(["Message" => 'success', "Detail" => "Data penjualan $request->id_nota berhasil didelete"]);
        } else {
            return response()->json(["Message" => 'gagal', "Detail" => 'Data penjualan gagal didelete']);
        }
    }
}