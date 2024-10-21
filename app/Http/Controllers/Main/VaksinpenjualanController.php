<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Vaksinpenjualan;
use Illuminate\Http\Request;

class VaksinpenjualanController extends Controller
{
    public function index()
    {
        $vaksinpenjualan = Vaksinpenjualan::all(); // Mengambil semua data vaksin
        return view('dashboard.vaksin_penjualan.index', compact('vaksinpenjualan'));
    }

  
}
