<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Distributor_pbfs;
use App\Models\vaksinMaster;
use Illuminate\Http\Request;

class vaksinMasterController extends Controller
{
    public function index()
    {
       
        $vaksinMaster = vaksinMaster::with('distributor_pbfs')->get();
        return view('dashboard.vaksin_master.index', compact('vaksinMaster','distributor_pbfs'));
    }

    public function create()
    {
        $distributor_pbfs = Distributor_pbfs::all();
        return view('dashboard.vaksin_master.create', compact( 'distributor_pbfs'));
    }

    public function store(Request $request)
    {
        vaksinMaster::create($request->all());
        return redirect()->back()->with('success', 'Data vaksinMaster berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $vaksinMaster = vaksinMaster::findOrFail($id);
        return view('dashboard.vaksin_master.edit', compact('vaksinMaster'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_vaksinMaster' => 'required|string|max:100',
        //     // Validasi lainnya sesuai kebutuhan
        // ]);

        $vaksinMaster = vaksinMaster::findOrFail($id);
        $vaksinMaster->update($request->all());
        return redirect()->back()->with('success', 'Data vaksinMaster berhasil diupdate.');
    }

    public function destroy($id)
    {
        $vaksinMaster = vaksinMaster::findOrFail($id);
        $vaksinMaster->delete();
        return redirect()->back()->with('success', 'Data vaksinMaster berhasil dihapus.');
    }

    // public function getvaksinMasterIsi($id)
    // {
    //     $vaksinMaster_isi = vaksinMasterPaket::where('id_jenis_paket', $id)->get();
    //     return response()->json($vaksinMaster_isi);
    // }

    public function printPasbook($id) {
        $pasien = Pasien::find($id);
        $data = [
            "nama" => $pasien->nama,
            "passport" => $pasien->no_passport
        ];
        
        return view('dashboard.vaksinMaster_registrasis.printPasbook', $data);
    }
}
