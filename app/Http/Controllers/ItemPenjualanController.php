<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item_penjualan;

class ItemPenjualanController extends Controller
{
    public function index(){
        return Item_penjualan::all();
    }
}
