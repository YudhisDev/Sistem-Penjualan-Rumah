<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use App\Http\Requests\StorePembeliRequest;
use App\Http\Requests\UpdatePembeliRequest;
use Illuminate\Http\RedirectResponse;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('Pembeli/index');
    }
    public function index()
    {
        $data = Pembeli::all();
        return view('Pembeli/pembeli', [
            'pembeli' => $data
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nik' => 'required|unique:pembelis|max:255',
            'nama' => 'required|string|max:255',
            'kelamin' => 'required|string',
            'umur' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kode_pos' => 'required|max:255'
        ]);
        Pembeli::create($validated);
        return redirect('/pembeli')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembeli $pembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $rules = [
            'nama' => 'required|string',
            'kelamin' => 'required|string',
            'umur' => 'required|string',
            'alamat' => 'required|string|max:225',
            'kode_pos' => 'required|string|max:225',
        ];
        $validated = $request->validate($rules);
        Pembeli::where('nik', $request->nik)->update($validated);
        return redirect('/pembeli')->with('edit', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembeli $pembeli)
    {
        Pembeli::destroy($pembeli->nik);
        return redirect('/pembeli')->with('delete', 'Data Berhasil Dihapus');
    }
}
