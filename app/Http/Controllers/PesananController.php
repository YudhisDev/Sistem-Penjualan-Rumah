<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Pembeli;
use App\Models\Pesanan;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use Illuminate\Http\Request;

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
            'id_pesanan' => 'required|unique:pesanans',
            'nik' => 'required',
            'kode_rumah' => 'required',
            'jumlah' => 'required|numeric',
            'status' => 'required|string'
        ]);
        Pesanan::create($validated);
        return redirect('/pemesanan')->with('success', 'Data Berhasil Ditambahkan');
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
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
