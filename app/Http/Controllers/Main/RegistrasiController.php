<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Registrasi;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    // Menampilkan daftar registrasi
    public function index()
    {
        $registrasi = Registrasi::all(); // Mengambil semua data registrasi
        return view('dashboard.registrasi.index', compact('registrasi'));
    }

    // Menampilkan form untuk membuat registrasi baru
    public function create()
    {
        return view('dashboard.registrasi.create');
    }

    // Menyimpan data registrasi baru
    public function store(Request $request)
    {
        $request->validate([
            'no_reg' => 'required|string|max:50|unique:registrasis',
            'rm_pasien' => 'required|integer|exists:pasiens,id_rm', // harus ada di tabel pasiens
            'dokter' => 'required|string|max:100',
            'assisten' => 'nullable|string|max:100',
            'tgl_berangkat' => 'required|date',
            'negara_tujuan' => 'required|string|max:100',
            'jenis_vaksinasi' => 'required|string|max:100',
            'status' => 'required|in:wus,non wus',
            'vaksin_wajib' => 'required|string|max:100',
            'vaksin_tambahan' => 'nullable|string|max:100',
            'nama_travel' => 'nullable|string|max:100',
            'alamat_travel' => 'nullable|string|max:255',
            'tindakan' => 'required|in:proses,selesai',
            'apotek_status' => 'required|in:proses,selesai',
            'kasir_status' => 'required|in:proses,selesai',
            'buku_icv' => 'required|in:sudah,belum',
            'pp_test' => 'required|in:iya,tidak',
        ]);

        Registrasi::create($request->all());
        return redirect()->route('dashboard.registrasi.index')->with('success', 'Data registrasi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit registrasi
    public function edit($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        return view('dashboard.registrasi.edit', compact('registrasi'));
    }

    // Mengupdate data registrasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'rm_pasien' => 'required|integer|exists:pasiens,id_rm',
            'dokter' => 'required|string|max:100',
            // Validasi lainnya sesuai kebutuhan
        ]);

        $registrasi = Registrasi::findOrFail($id);
        $registrasi->update($request->all());
        return redirect()->route('dashboard.registrasi.index')->with('success', 'Data registrasi berhasil diupdate.');
    }

    // Menghapus data registrasi
    public function destroy($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete();
        return redirect()->route('dashboard.registrasi.index')->with('success', 'Data registrasi berhasil dihapus.');
    }
}
