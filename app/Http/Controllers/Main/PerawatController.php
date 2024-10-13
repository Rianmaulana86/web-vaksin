<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Perawat;
use Illuminate\Http\Request;

class PerawatController extends Controller
{
    public function index()
    {
        $perawat = Perawat::all(); // Mengambil semua data perawat
        return view('dashboard.perawat.index', compact('perawat'));
    }

    public function create()
    {
        return view('dashboard.perawat.create');
    }

    public function store(Request $request)
    {
        Perawat::create($request->all());
        return redirect()->back()->with('success', 'Data perawat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $perawat = Perawat::findOrFail($id);
        return view('dashboard.perawat.edit', compact('perawat'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_perawat' => 'required|string|max:100',
        //     // Validasi lainnya sesuai kebutuhan
        // ]);

        $perawat = Perawat::findOrFail($id);
        $perawat->update($request->all());
        return redirect()->back()->with('success', 'Data perawat berhasil diupdate.');
    }

    public function destroy($id)
    {
        $perawat = Perawat::findOrFail($id);
        $perawat->delete();
        return redirect()->back()->with('success', 'Data perawat berhasil dihapus.');
    }
}
