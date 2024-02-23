<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Rumah;
use App\Models\Pembeli;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembeli = Pembeli::all();
        $rumah = Rumah::all();
        $pesanan = Pesanan::all();
        return view('Pemesanan/pemesanan', [
            'pembeli' => $pembeli,
            'rumah' => $rumah,
            'pesanan' => $pesanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required',
            'kode_rumah' => 'required',
            'jumlah' => 'required|numeric',
            'status' => 'required|string'
        ]);
        $generated = $validated['nik'] . $validated['kode_rumah'];
        $validated['id_pesanan'] = $generated;
        $filter = Pesanan::all();
        $number = 0;
        foreach ($filter as $item) {
            if ($item->id_pesanan == $validated['id_pesanan']) {
                $number++;
            }
        }
        if ($number > 0) {
            return redirect('/pemesanan')->with('delete', 'Data Sudah Ada');
        } else {
            $available = Rumah::where('kode_rumah', $validated['kode_rumah'])->value('available');
            $rest = $available - $validated['jumlah'];
            Rumah::where('kode_rumah', $validated['kode_rumah'])->update(['available' => $rest]);
            Pesanan::create($validated);
            return redirect('/pemesanan')->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $pesanan = Pesanan::find($request->id_pesanan);
        $data = Rumah::find($request->kode_rumah);
        $available = $data->available;
        $jumlah = $pesanan->jumlah;

        if ($jumlah > $request->jumlah) {
            $num = $jumlah - $request->jumlah;
            $total = $available + $num;
        } else {
            $num = $request->jumlah - $jumlah;
            $total = $available - $num;
        }
        Rumah::where('kode_rumah', $request->kode_rumah)->update(['available' => $total]);
        $rules = [
            'jumlah' => 'required|numeric',
            'status' => 'required|string'
        ];
        $validated = $request->validate($rules);
        Pesanan::where('id_pesanan', $request->id_pesanan)->update($validated);
        return redirect('/pemesanan')->with('edit', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mengambil kode rumah
        $data = Pesanan::find($id);
        $code = $data->kode_rumah;
        // Mengambil property available
        $code_property = Rumah::find($code);
        $available_property = $code_property->available;
        // Total available after deletion
        $count = $data->jumlah;
        $rest = $available_property + $count;
        Rumah::where('kode_rumah', $code)->update(['available' => $rest]);

        Pesanan::destroy($id);
        return redirect('/pemesanan')->with('delete', 'Data Berhasil Dihapus');
    }
}
