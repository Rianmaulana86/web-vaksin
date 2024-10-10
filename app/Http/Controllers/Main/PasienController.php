<?php


namespace App\Http\Controllers\Main;

use App\Models\Pasien; // Model Pasien yang sudah kamu buat
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all(); // Mengambil semua data pasien
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rm' => 'required|integer|unique:pasiens',
            'nama_pasien' => 'required|string|max:100',
            'no_passport' => 'nullable|string|max:15',
            'tempat_lahir' => 'required|string|max:50',
            'tgl_lahir' => 'required|date',
            'kelamin' => 'required|string|max:15',
            'pekerjaan' => 'nullable|string|max:50',
            'alamat' => 'required|string|max:255',
            'telp' => 'nullable|string|max:25',
            'warga_negara' => 'required|string|max:255',
        ]);

        Pasien::create($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:100',
            // Validasi lainnya sesuai kebutuhan
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
