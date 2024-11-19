<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        return "Hallo, saya berada di halaman dokter index";
    }
    public function create()
    {
        return "Hallo, saya berada di halaman tambah data dokter";
    }
    public function edit($id): string
    {
        return "Hallo, saya berada di halaman edit dengan nilai $id";
    }
    public function show($id): string
    {
        return "Hallo, saya berada di halaman show dengan nilai $id";
    }
}

