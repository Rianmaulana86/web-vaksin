<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\VaksinRegistrasis;
use App\Models\Dokter;
use Illuminate\Http\Request;

class VaksinRegistrasisController extends Controller
{
    public function index()
    {
        $vaksin_registrasis = VaksinRegistrasis::with('pasien')->get();
        return view('dashboard.vaksin_registrasis.index', compact('vaksin_registrasis'));
    }

    public function create()
    {
        $dokters = Dokter::where('posisi', 'Dokter')->get();
        $asistens = Dokter::where('posisi', 'Asisten')->get();
        return view('dashboard.vaksin_registrasis.create', compact('dokters', 'asistens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_reg' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'id_pasien' => 'required|exists:pasien,id',
            'dokter' => 'required|integer',
            'asisten' => 'required|integer',
            'tanggal_berangkat' => 'required|date',
            'negara' => 'required|integer',
            'jenis_vaksinasi' => 'required|exists:vaksin_jenis_paket,id',
            'status' => 'required|in:wus,non wus',
            'travel' => 'required|integer',
            'tindakan_suntik' => 'required|in:Belum,Selesai',
            'pembayaran_kasir' => 'required|in:Belum,Selesai',
            'buku_icv' => 'required|in:Belum,Sudah',
            'pp_test' => 'required|in:Ya,Tidak',
        ]);

        VaksinRegistrasi::create($request->all());

        return redirect()->route('dashboard.vaksin_registrasis.index')->with('success', 'Registrasi vaksin Pasien berhasil!');
    }
}
