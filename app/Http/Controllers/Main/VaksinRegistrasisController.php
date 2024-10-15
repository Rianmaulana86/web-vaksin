<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\VaksinRegistrasis;
use App\Models\Dokter;
use App\Models\Country;
use App\Models\Vaksin;
use App\Models\travel;
use Illuminate\Http\Request;

class VaksinRegistrasisController extends Controller
{
    public function index(Request $request)
    {
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
            ->orderBy('no_reg', 'desc') 
            ->paginate(20); 
    
        return view('dashboard.vaksin_registrasis.index', compact('vaksin_registrasis', 'search'));
    }
    

    public function create()
    {
            $dokters = Dokter::where('posisi', 'Dokter')->get();
            $asistens = Dokter::where('posisi', 'Asisten')->get();
            $country = Country::all();
            $vaksin = Vaksin::all();
            $travel = Travel::all();

            $today = date('ymd'); 
            $milliseconds = round(microtime(true) * 1000) % 1000;
            $lastReg = VaksinRegistrasis::orderBy('created_at', 'desc')->first();
            $urutan = $lastReg ? (int) substr($lastReg->no_reg, -3) + 1 : 1; 
            $no_reg = 'RV' . $today . str_pad($milliseconds, 3, '0', STR_PAD_LEFT) . str_pad($urutan, 3, '0', STR_PAD_LEFT);

            return view('dashboard.vaksin_registrasis.create', compact('dokters', 'asistens', 'country', 'no_reg','vaksin','travel'));
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
