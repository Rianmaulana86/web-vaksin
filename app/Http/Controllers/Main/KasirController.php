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
        return view('dashboard.kasir.create');
    }

    public function store(Request $request)
{
    // Menggunakan data manual untuk debugging
    $data = [
        'no_kwitansi' => sprintf('%06d', (Kasir::max('id') ? Kasir::max('id') + 1 : 1)),
        'no_registrasi' => 'REG123',    
        'jumlah_tagihan' => 365000,
        'diskon'=>0,
        'total_tagihan' => 100000,
       'cara_bayar' => 'cash',
    ];

    // Debug data
    dd($data);

    // Simpan data ke database
    Kasir::create($data);

    return redirect()->back()->with('success', 'Data Kasir berhasil ditambahkan.');
}
    public function store111(Request $request)
    {
        $validatedData = $request->validate([
            'cara_bayar' => 'string',
            'no_registrasi' => 'string',
            'jumlah_tagihan' => 'required|numeric',
        ]);

    
        // Hitung nomor urut untuk no_kwitansi
        $lastKwitansi = Kasir::max('id'); // Mengambil ID terakhir
        $nextKwitansiNumber = $lastKwitansi ? $lastKwitansi + 1 : 1; // Menentukan nomor berikutnya
        $no_kwitansi = sprintf('%06d', $nextKwitansiNumber); // Format menjadi 000001
    
        // Tambahkan no_kwitansi ke data yang akan disimpan
        $validatedData['no_kwitansi'] = $no_kwitansi;
    
        // Simpan data ke database
        Kasir::create($validatedData);
    
        return redirect()->back()->with('success', 'Data Kasir berhasil ditambahkan.');
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
        // $pasien = Pasien::all();
        // $vaksinRegistrasis = VaksinRegistrasis::all();
       
        // return view('dashboard.kasir.setPembayaran', compact('vaksin','kasir','pasien','vaksinRegistrasis'));

        $vaksinRegistrasi = VaksinRegistrasis::with('pasien','vaksinpaket')->findOrFail($id);
    
        return view('dashboard.kasir.setPembayaran', compact('vaksinRegistrasi'));

    }
}
