<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Vaksin;
use App\Models\VaksinPaket;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    public function index()
    {
        $vaksin = Vaksin::all(); // Mengambil semua data vaksin
        return view('dashboard.vaksin.index', compact('vaksin'));
    }

    public function create()
    {
        return view('dashboard.vaksin.create');
    }

    public function store(Request $request)
    {
        Vaksin::create($request->all());
        return redirect()->back()->with('success', 'Data vaksin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $vaksin = Vaksin::findOrFail($id);
        return view('dashboard.vaksin.edit', compact('vaksin'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_vaksin' => 'required|string|max:100',
        //     // Validasi lainnya sesuai kebutuhan
        // ]);

        $vaksin = Vaksin::findOrFail($id);
        $vaksin->update($request->all());
        return redirect()->back()->with('success', 'Data vaksin berhasil diupdate.');
    }

    public function destroy($id)
    {
        $vaksin = Vaksin::findOrFail($id);
        $vaksin->delete();
        return redirect()->back()->with('success', 'Data vaksin berhasil dihapus.');
    }

    // public function getVaksinIsi($id)
    // {
    //     $vaksin_isi = VaksinPaket::where('id_jenis_paket', $id)->get();
    //     return response()->json($vaksin_isi);
    // }

    public function printPasbook($id) {
        $pasien = Pasien::find($id);
        $data = [
            "nama" => $pasien->nama,
            "passport" => $pasien->no_passport
        ];
        
        return view('dashboard.vaksin_registrasis.printPasbook', $data);
    }
}
