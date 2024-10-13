<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $poli = Poli::all(); // Mengambil semua data poli
        return view('dashboard.poli.index', compact('poli'));
    }

    public function create()
    {
        return view('dashboard.poli.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_poli' => 'required|string|max:100',
        //     'no_passport' => 'nullable|string|max:15',
        //     'tempat_lahir' => 'required|string|max:50',
        //     'tgl_lahir' => 'required|date',
        //     'kelamin' => 'required|string|max:15',
        //     'pekerjaan' => 'nullable|string|max:50',
        //     'alamat' => 'required|string|max:255',
        //     'telp' => 'nullable|string|max:25',
        //     'warga_negara' => 'required|string|max:255',
        // ]);

        Poli::create($request->all());
        return redirect()->back()->with('success', 'Data poli berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('dashboard.poli.edit', compact('poli'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_poli' => 'required|string|max:100',
        //     // Validasi lainnya sesuai kebutuhan
        // ]);

        $poli = Poli::findOrFail($id);
        $poli->update($request->all());
        return redirect()->back()->with('success', 'Data poli berhasil diupdate.');
    }

    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();
        return redirect()->back()->with('success', 'Data poli berhasil dihapus.');
    }
}
