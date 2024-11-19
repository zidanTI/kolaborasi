@extends('layouts.app_modern', ['title' => 'Edit Data Pasien'])

@section('content')
    <div class="card">
        <div class="card-header">Edit Data Pasien {{ strtoupper($pasien->nama) }}</b></div>
        <div class="card-body">
            <form action="/pasien/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- Foto -->
                <div class="form-group mt-3">
                    <label for="foto">Foto Pasien (file. jpeg, png)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                        name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span> <!-- menampilkan error jika ada -->
                    <img src="{{ \Storage::url($pasien->foto) }}" alt="Foto Pasien" class="img-thumbnail mt-2"
                        style="width: 100px;">
                </div>
                <!-- Nama -->
                <div class="form-group mt-3">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') ?? $pasien->nama }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span> <!-- menampilkan error dari nama -->
                </div>
                <!-- No Pasien -->
                <div class="form-group mt-3">
                    <label for="no_pasien">No Pasien</label>
                    <input type="text" class="form-control @error('no_pasien') is-invalid @enderror" id="no_pasien"
                        name="no_pasien" value="{{ old('no_pasien') ?? $pasien->no_pasien }}">
                    <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                </div>
                <!-- Umur -->
                <div class="form-group mt-3">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur"
                        name="umur" value="{{ old('umur') ?? $pasien->umur }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                    <!-- mempertahankan inputan sebelumnya dari user -->
                </div>
                <!-- Jenis Kelamin -->
                <div class="form-group mt-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="laki-laki"
                            {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan"
                            {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>
                <!-- Alamat -->
                <div class="form-group mt-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') ?? $pasien->alamat }}">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
