<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $kasir= Kasir::all(); // Mengambil semua data Kasir
        return view('dashboard.Kasir.index', compact('kasir'));
    }

    public function create()
    {
        return view('dashboard.kasir.create');
    }

    public function store(Request $request)
    {
        Kasir::create($request->all());
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
}
