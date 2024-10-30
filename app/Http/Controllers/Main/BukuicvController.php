<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Kasir;
use App\Models\BukuCetak;
use App\Models\Vaksin;
use App\Models\VaksinRegistrasis;
use Illuminate\Http\Request;

class BukuicvController extends Controller
{
    // public function index(Request $request)
    // {
    //     $vaksinregistrasi = VaksinRegistrasis::all(); 
    //     $search = $request->input('search');
        
    //     $bukucetak = BukuCetak::with('vaksinregistrasis', 'pasien') // Load both relationships
    //         ->when($search, function ($query, $search) {
    //             return $query->where('id', 'like', "%{$search}%")
    //                 ->orWhereHas('pasien', function ($query) use ($search) {
    //                     $query->where('nama_pasien', 'like', "%{$search}%")
    //                         ->orWhere('no_rm', 'like', "%{$search}%")
    //                         ->orWhere('no_passport', 'like', "%{$search}%");
    //                 });
    //         })
    //         ->orderBy('id', 'desc') 
    //         ->paginate(20); 
    
    //     return view('dashboard.vaksin_icv_cetak.index', compact('bukucetak', 'search'));
    // }

    // public function index(Request $request)
    // {
    //     $search = $request->input('search');
        
    //     $bukuCetak = BukuCetak::with('vaksinRegistrasis.pasien') // Eager load VaksinRegistrasis and its Pasien
    //         ->when($search, function ($query, $search) {
    //             return $query->where('id', 'like', "%{$search}%")
    //                 ->orWhereHas('vaksinRegistrasis.pasien', function ($query) use ($search) {
    //                     $query->where('nama_pasien', 'like', "%{$search}%")
    //                         ->orWhere('no_rm', 'like', "%{$search}%")
    //                         ->orWhere('no_passport', 'like', "%{$search}%");
    //                 });
    //         })  
    //         ->orderBy('id', 'desc') 
    //         ->paginate(20); 
    
    //     return view('dashboard.vaksin_icv_cetak.index', compact('bukuCetak', 'search'));
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $bukuCetak = BukuCetak::with(['vaksinRegistrasis.pasien'])
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('vaksinRegistrasis.pasien', function ($query) use ($search) {
                        $query->where('nama', 'like', "%{$search}%")
                            ->orWhere('id_rm', 'like', "%{$search}%");
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('dashboard.vaksin_icv_cetak.index', compact('bukuCetak', 'search'));
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

    
    public function inputCetakBuku(Request $request)
    {
        BukuCetak::create($request->all());
        //return redirect()->back()->with('success', 'Silahkan Buku Dicetak');
        
        return redirect()->route('vaksin_icv_cetak.index')->with('success', 'Silahkan Lanjutkan Cetak.');
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

        $pasien = Pasien::all();
        $vaksin = Vaksin::all();       
        $vaksinRegistrasi = VaksinRegistrasis::with('pasien','vaksinpaket')->findOrFail($id);
        $vaksinIcvCetak = BukuCetak::all();       
        return view('dashboard.vaksin_icv_cetak.create', compact('vaksinIcvCetak','vaksinRegistrasi'));

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
