<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mahasiswa'] = \App\Models\Mahasiswa::latest()->paginate(10);
        return view('mahasiswa_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim', //dari inputan form, unique gak bisa sama
            'nama_mhs' => 'required|min:3',
            'prodi' => 'required|in:Teknik Informatika,Sistem Informasi',//harus antara kedua ini
            'asal' => 'nullable',//boleh kosong
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000'
            //mimes: ekstensi/jenis file
        ]);
        //koding ke database
        $mahasiswa = new \App\Models\Mahasiswa(); //membuat objek kosong di variable model
        $mahasiswa->fill($requestData); //mengisi var model dengan data yang sudah ada
        $mahasiswa->foto = $request->file('foto')->store('public');//mengisi object file foto
        $mahasiswa->save(); //menyimpan data ke database
        flash('Data sudah disimpan')->success();
        return back();
        //mengarahkan user ke url sebelumya yaitu /pasien/create dengan membawa variable
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
