<?php

namespace App\Http\Controllers;

use App\Models\Kredit;
use App\Http\Requests\StoreKreditRequest;
use App\Http\Requests\UpdateKreditRequest;

class KreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "hello world";
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
    public function store(StoreKreditRequest $request)
    {
        //
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
    public function update(UpdateKreditRequest $request, Kredit $kredit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kredit $kredit)
    {
        //
    }
}
