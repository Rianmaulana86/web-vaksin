<?php


namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all(); // Mengambil semua data pasien
        return view('dashboard.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('dashboard.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        // Generate unique no_rm
            $latestNoRm = Pasien::max('no_rm');
            $nextNumber = 1;

            if ($latestNoRm) {
                $nextNumber = (int) substr($latestNoRm, 2) + 1; // Extract number and increment
            }

            $noRm = 'VA' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT); // Format: VA00001

            // Create pasien record
            Pasien::create(array_merge($request->all(), ['no_rm' => $noRm]));
            return redirect()->back()->with('success', 'Data Pasien berhasil ditambahkan.');
        //return redirect()->route('dashboard.pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('dashboard.pasien.edit', compact('pasien'));
        //return redirect()->back()->with('success', 'Data Pasien berhasil di Edit.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([    
            'nama_pasien' => 'required|string|max:100',
            // Validasi lainnya sesuai kebutuhan
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());   
        return redirect()->back()->with('success', 'Data Pasien berhasil di edit.');
        //return redirect()->route('dashboard.pasien.index')->with('success', 'Data pasien berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->back()->with('success', 'Data Pasien berhasil dihapus.');
    }
}
