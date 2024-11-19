<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::latest()->paginate(10);
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return('Ini adalah Method Create, dalam PasienController');
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien', //dari inputan form, unique gak bisa sama
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',//harus angka
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',//harus antara kedua ini
            'alamat' => 'nullable',//boleh kosong
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000'
            //mimes: ekstensi/jenis file
        ]);
        //koding ke database
        $pasien = new \App\Models\pasien(); //membuat objek kosong di variable model
        $pasien->fill($requestData); //mengisi var model dengan data yang sudah ada
        $pasien->foto = $request->file('foto')->store('public');//mengisi object file foto
        $pasien->save(); //menyimpan data ke database
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
        $data['pasien'] = \App\Models\pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id, //dari inputan form, unique gak bisa sama
            'nama' => 'required|min:3', //minimal 3 karakter
            'umur' => 'required|numeric', //harus angka
            'jenis_kelamin' => 'required|in:laki-laki,perempuan', //harus antara kedua ini
            'alamat' => 'nullable', //boleh kosong
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000'
            //mimes: ekstensi/jenis file //opsional foto di update apa gk
        ]);

        //koding ke database
        $pasien = \App\Models\Pasien::findOrFail($id); //membuat objek kosong di variable model
        $pasien->fill($requestData); //mengisi var model dengan data yang sudah ada

        if ($request->hasFile('foto')) {
            Storage::delete($pasien->foto); //menghapus foto lama
            $pasien->foto = $request->file('foto')->store('public'); //menyimpan foto baru
        }

        $pasien->save(); //menyimpan data ke database
        flash('Data sudah diupdate')->success();
        return redirect('/pasien');
        //mengarahkan user ke url sebelumnya yaitu /pasien/create dengan membawa variable
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        if ($pasien->daftar->count() >= 1) {
            flash('Data tidak bisa dihapus karena sudah terkait dengan data pendaftaran')->error();
            return back();
        }
        if ($pasien->foto != null && Storage::exists($pasien->foto)) {
            Storage::delete($pasien->foto);
        }
        $pasien->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }

}
