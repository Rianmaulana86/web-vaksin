<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kasir;
use App\Models\Vaksin;
use App\Models\Pasien;
use App\Models\VaksinRegistrasis;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index(Request $request)
    {
        $kasir= Kasir::all(); 
        $search = $request->input('search');
        $vaksin_registrasis = VaksinRegistrasis::with('pasien','jenisVaksin')
            ->when($search, function ($query, $search) {
                return $query->where('no_reg', 'like', "%{$search}%")
                             ->orWhereHas('pasien', function ($query) use ($search) {
                                 $query->where('nama_pasien', 'like', "%{$search}%")
                                       ->orWhere('no_rm', 'like', "%{$search}%")
                                       ->orWhere('no_passport', 'like', "%{$search}%");
                             });
            })
            ->orderBy('id', 'desc') 
            ->paginate(20); 
    
        return view('dashboard.kasir.index', compact('vaksin_registrasis', 'search','kasir'));
        
    }

    public function create()
    {
       return view('dashboard.vaksin_registrasis.index');
       //return redirect()->back()->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function simpan(Request $request)
    {
        \Log::info($request->all()); // Untuk melihat data yang diterima
        $data = [
            'no_kwitansi' => sprintf('%06d', (Kasir::max('no_kwitansi') ? Kasir::max('no_kwitansi') + 1 : 1)),
            'no_reg' => $request->no_reg,
            'jumlah_tagihan' => (int)$request->jumlah_tagihan,  // Konversi ke integer
            'diskon' => $request->diskon,
            'total_tagihan' => (int)$request->total_tagihan,  // Konversi ke integer
            'cara_bayar' => $request->cara_bayar
        ];

        Kasir::create($data);
        return redirect()->route('vaksin_registrasis.index')->with('success', 'Pembayaran berhasil.');
    }

    public function store11(Request $request)
    {
        $data = [
            'no_kwitansi' => sprintf('%06d', (Kasir::max('no_kwitansi') ? Kasir::max('no_kwitansi') + 1 : 1)),
            'no_reg' => $request->no_reg,
            'jumlah_tagihan' => (int)$request->jumlah_tagihan,  // Konversi ke integer
            'diskon' => $request->diskon,
            'total_tagihan' => (int)$request->total_tagihan,  // Konversi ke integer
            'cara_bayar' => $request->cara_bayar
        ];
        //dd($data);
        // Simpan data ke database
        Kasir::create($data);
        return redirect()->back()->with('success', 'Pembayaran berhasil.');
    }

    public function edit($id)
    {
        $kasir= Kasir::findOrFail($id);
        return view('dashboard.Kasir.edit', compact('kasir'));
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


    public function setPembayaran(Request $request, $id)
    {
      
        // $kasir = Kasir::all();
        // $vaksin = Vaksin::all();
         $pasien = Pasien::all();
        // $vaksinRegistrasis = VaksinRegistrasis::all();
       
        // return view('dashboard.kasir.setPembayaran', compact('vaksin','kasir','pasien','vaksinRegistrasis'));

        $vaksinRegistrasi = VaksinRegistrasis::with('pasien','vaksinpaket')->findOrFail($id);
    
        return view('dashboard.kasir.setPembayaran', compact('vaksinRegistrasi'));

    }
}
