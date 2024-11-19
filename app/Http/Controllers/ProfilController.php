<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        echo "Nama saya" , $request ->nama;
        echo "<br>";
        echo "Umur saya" , $request ->umur;
        //return "Hallo, saya adalah fungsi index dalam profil controller";
    }
    public function create()
    {
        return "Hallo, saya adalah fungsi Create dalam profil controller";
    }
    public function edit($nama,$id): string
    {
        return "Hallo, nama saya $nama dan NIM saya adalah $id";
    }
}
