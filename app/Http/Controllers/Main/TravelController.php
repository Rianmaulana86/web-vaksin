<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $travel = Travel::all(); // Mengambil semua data travel
        return view('dashboard.travel.index', compact('travel'));
    }

    public function create()
    {
        return view('dashboard.travel.create');
    }

    public function store(Request $request)
    {
        Travel::create($request->all());
        return redirect()->back()->with('success', 'Data travel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $travel = Travel::findOrFail($id);
        return view('dashboard.travel.edit', compact('travel'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_travel' => 'required|string|max:100',
        //     // Validasi lainnya sesuai kebutuhan
        // ]);

        $travel = Travel::findOrFail($id);
        $travel->update($request->all());
        return redirect()->back()->with('success', 'Data travel berhasil diupdate.');
    }

    public function destroy($id)
    {
        $travel = Travel::findOrFail($id);
        $travel->delete();
        return redirect()->back()->with('success', 'Data travel berhasil dihapus.');
    }
}
