<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Kasir;
use App\Models\BukuCetak;
use Illuminate\Http\Request;

class BukuicvController extends Controller
{
    public function index(Request $request)
    {
        $pasien= Pasien::all(); 
        $search = $request->input('search');
        $bukucetak = BukuCetak::with('pasien')
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                             ->orWhereHas('pasien', function ($query) use ($search) {
                                 $query->where('nama_pasien', 'like', "%{$search}%");
                                       //->orWhere('no_rm', 'like', "%{$search}%")
                                       //->orWhere('no_passport', 'like', "%{$search}%");
                             });
            })
            ->orderBy('id', 'desc') 
            ->paginate(20); 
    
        return view('dashboard.vaksin_icv_cetak.index', compact('bukucetak', 'search'));
    }

    public function create()
    {
        return view('dashboard.vaksin_icv_cetak.create');
    }

    public function store(Request $request)
    {
        VaksinIcvCetak::create($request->all());
        return redirect()->back()->with('success', 'Buku ICV berhasil dicetak.');
    }

    public function edit($id)
    {
        $kasir= Kasir::findOrFail($id);
        return view('dashboard.vaksin_icv_cetak.edit', compact('kasir'));
    }

    public function update(Request $request, $id)
    {

        $kasir= Kasir::findOrFail($id);
        $kasir->update($request->all());
        return redirect()->back()->with('success', 'Data Kasir berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kasir= Kasir::findOrFail($id);
        $kasir->delete();
        return redirect()->back()->with('success', 'Data Kasir berhasil dihapus.');
    }


    public function bukuIcvCetak(Request $request, $id)
    {

        $vaksinIcvCetak = BukuCetak::all();       
        return view('dashboard.vaksin_icv_cetak.create', compact('vaksinIcvCetak'));

    }

    public function bukuIcvDiterima(Request $request, $id)
    {
        $vaksinIcvDiterima = BukuCetak::all();       
        return view('dashboard.vaksin_icv_cetak.bukuDiterima    ', compact('vaksinIcvDiterima'));
    }


    public function bukuIcvCetakHal1(Request $request, $id)
    {

        $pasien = Pasien::findOrFail($id);       
        return view('dashboard.vaksin_icv_cetak.cetakhal1', compact('pasien'));

    }

    public function bukuIcvCetakHal6(Request $request, $id)
    {

        $pasien = Pasien::findOrFail($id);       
        return view('dashboard.vaksin_icv_cetak.cetakhal6', compact('pasien'));

    }
}
