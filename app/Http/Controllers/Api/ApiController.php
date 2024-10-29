<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\VaksinPaket;

class ApiController extends Controller
{
    public function search(Request $request)//cari pasien
    {
        // Validate the search query
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $query = $request->input('search');
        // Search for patients by name or passport number
        // $patients = Pasien::where('nama_pasien', 'LIKE', "%$query%")
        //     ->orWhere('no_passport', 'LIKE', "%$query%")
        //     ->orWhere('no_rm', 'LIKE', "%$query%" )
        //     ->get();

            $patients = Pasien::where('nama_pasien', 'LIKE', "%$query%")
            ->orWhere('no_passport', 'LIKE', "%$query%")
            ->orWhere('no_rm', 'LIKE', "%$query%")
            ->get()
            ->map(function ($patient) {
                $age = Carbon::parse($patient->tgl_lahir)->age;
                $patient->age = $age;
                return $patient;
            });

        return response()->json($patients);
    }
}
