<?php

namespace App\Http\Controllers;

use App\Models\poli;
use Illuminate\Http\Request;
use App\Http\Requests\StorepoliRequest;
use App\Http\Requests\UpdatepoliRequest;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poli'] = \App\Models\poli::latest()->paginate(10);
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'biaya' => 'required|numeric',//harus angka
            'keterangan' => 'nullable',//boleh kosong
            //mimes: ekstensi/jenis file
        ]);
        //koding ke database
        $poli = new \App\Models\poli(); //membuat objek kosong di variable model
        $poli->fill($requestData); //mengisi var model dengan data yang sudah ada
        $poli->save(); //menyimpan data ke database
        flash('Data sudah disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['poli'] = \App\Models\poli::findOrFail($id);
        return view('poli_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'biaya' => 'required|numeric',//harus angka
            'keterangan' => 'nullable',//boleh kosong
        ]);
        //koding ke database
        $poli = new \App\Models\poli(); //membuat objek kosong di variable model
        $poli->fill($requestData); //mengisi var model dengan data yang sudah ada
        $poli->save(); //menyimpan data ke database
        flash('Data sudah disimpan')->success();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = \App\Models\poli::findOrFail($id);
        if ($poli->daftar->count() >= 1) {
            flash('Data tidak bisa dihapus karena sudah terkait dengan data pendaftaran')->error();
            return back();
        }

        $poli->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }
}
