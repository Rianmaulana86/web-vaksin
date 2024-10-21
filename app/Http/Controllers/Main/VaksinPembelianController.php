<?php   
namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Vaksin_master;
use App\Models\Vaksinpembelian;
use Illuminate\Http\Request;

class VaksinPembelianController extends Controller
{
    public function index()
    {
        $vaksin = Vaksinpembelian::all()    ;
        return view('dashboard.vaksin_pembelian.index', compact('vaksin'));
    }

    public function create()
    {
        $vaksin_master = Vaksin_master::with('distributor_pbfs')->get();
        return view('dashboard.vaksin_pembelian.create', compact( 'vaksin_master'));
    }

    public function store(Request $request)
    {
        //\DB::enableQueryLog();
        Vaksinpembelian::create($request->all());

        $queries = \DB::getQueryLog();

        // Tampilkan log kueri dengan dd
        //dd($queries);

        return redirect()->back()->with('success', 'Data vaksin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $vaksin = Vaksinpembelian::findOrFail($id);
        return view('dashboard.vaksin_pembelian.edit', compact('vaksin'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_vaksin' => 'required|string|max:100',
        //     // Validasi lainnya sesuai kebutuhan
        // ]);

        $vaksin = VaksinPaket::findOrFail($id);
        $vaksin->update($request->all());
        return redirect()->back()->with('success', 'Data vaksin berhasil diupdate.');
    }

    public function destroy($id)
    {
        $vaksin = VaksinPaket::findOrFail($id);
        $vaksin->delete();
        return redirect()->back()->with('success', 'Data vaksin berhasil dihapus.');
    }
}
