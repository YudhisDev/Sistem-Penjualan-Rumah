<?php

namespace App\Http\Controllers;

use App\Models\Kredit;
use App\Http\Requests\StoreKreditRequest;
use App\Http\Requests\UpdateKreditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Kredit::all();
        return view('Cicilan/cicilan', [
            'cicilan' => $query
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
            'kode_kredit' => 'required',
            'deskripsi' => 'required|string',
            'waktu' => 'required|numeric',
            'bunga' => 'required|numeric',
        ]);

        Kredit::create($validated);
        return redirect('/kredit')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kredit $kredit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kredit $kredit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kredit $kredit)
    {
        $rules = [
            'deskripsi' => 'required',
            'waktu' => 'required|numeric',
            'bunga' => 'required|numeric',
        ];
        $validated = $request->validate($rules);
        Kredit::where('kode_kredit', $request->kode_kredit)->update($validated);
        return redirect('/kredit')->with('edit', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kredit $kredit)
    {
        Kredit::destroy($kredit->kode_kredit);
        return redirect('/kredit')->with('delete', 'Data Berhasil Dihapus');
    }
}
