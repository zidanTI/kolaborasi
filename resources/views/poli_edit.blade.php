@extends('layouts.app_modern', ['title' => 'Edit Data Poli'])

@section('content')
    <div class="card">
        <div class="card-header">Edit Data Poli {{ strtoupper($poli->nama) }}</b></div>
        <div class="card-body">
            <form action="/poli/{{ $poli->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- Nama -->
                <div class="form-group mt-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') ?? $poli->nama }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span> <!-- menampilkan error dari nama -->
                </div>
                <!-- biaya -->
                <div class="form-group mt-3">
                    <label for="biaya">Biaya</label>
                    <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                        name="biaya" value="{{ old('biaya') ?? $poli->biaya }}">
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
                    <!-- mempertahankan inputan sebelumnya dari user -->
                </div>
                <!-- Alamat -->
                <div class="form-group mt-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan" value="{{ old('keterangan') ?? $poli->keterangan }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
