<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VaksinPaket;

class VaksinController extends Controller
{
    public function getVaksinIsi($id)
    {
        if (!is_numeric($id)) {
            return response()->json(['error' => 'Invalid ID'], 400);
        }
        $vaksin_isi = VaksinPaket::where('id_jenis_paket', $id)->get();
        if ($vaksin_isi->isEmpty()) {
            return response()->json(['message' => 'No records found'], 404);
        }
        return response()->json($vaksin_isi);
    }
}
