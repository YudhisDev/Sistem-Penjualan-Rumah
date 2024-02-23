<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Http\Requests\StoreRumahRequest;
use App\Http\Requests\UpdateRumahRequest;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rumah::all();
        return view('Rumah/rumah', [
            'rumah' => $data
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
            'kode_rumah' => 'required|unique:rumahs|max:11',
            'nama_rumah' => 'required|string|max:20',
            'varian' => 'required|string',
            'available' => 'required|numeric|max:255',
            'harga' => 'required|numeric'
        ]);
        Rumah::create($validated);
        return redirect('/rumah')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rumah $rumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rumah $rumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rumah $rumah)
    {
        $rules = [
            'nama_rumah' => 'required|string|max:20',
            'varian' => 'required|string',
            'available' => 'required|numeric|max:255',
            'harga' => 'required|numeric'
        ];
        $validated = $request->validate($rules);
        Rumah::where('kode_rumah', $request->kode_rumah)->update($validated);
        return redirect('/rumah')->with('edit', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rumah $rumah)
    {
        Rumah::destroy($rumah->kode_rumah);
        return redirect('/rumah')->with('delete', 'Data Berhasil Dihapus');
    }
}
