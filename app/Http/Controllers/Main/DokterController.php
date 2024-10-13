<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all(); // Mengambil semua data dokter
        return view('dashboard.dokter.index', compact('dokter'));
    }

    public function create()
    {
        return view('dashboard.dokter.create');
    }

    public function store(Request $request)
    {
        Dokter::create($request->all());
        return redirect()->back()->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dashboard.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());
        return redirect()->back()->with('success', 'Data dokter berhasil diupdate.');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
        return redirect()->back()->with('success', 'Data dokter berhasil dihapus.');
    }
}
