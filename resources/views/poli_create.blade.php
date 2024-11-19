@extends('layouts.app_modern', ['tittle' => 'Tambah Data Pasien '])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Tambah Data poli</h5>

            <form action="/poli" method="POST" enctype="multipart/form-data">
                @csrf {{-- keamanan --}}
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span> <!--menampilkan error id dari nama-->
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="biaya">Biaya</label>
                    <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                        name="biaya" value="{{ old('biaya') }}"> <!--untuk mempertahankan inputan sebelumnya dari user-->
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan" value="{{ old('keterangan') }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
