@extends('mylayout', ['tittle' => 'Tambah Data Mahasiswa '])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Data mahasiswa</h5>

            <form action="/Mahasiswa" method="POST" enctype="multipart/form-data">
                 @csrf {{-- keamanan --}}
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto mahasiswa (jpg, jpeg, png)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span> <!--menampilkan error id dari nama-->
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nim">NIM mahasiswa</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                    name="nim" value="{{ old('nim') }}">
                    <span class="text-danger">{{ $errors->first('nim') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_mhs">Nama mahasiswa</label>
                    <input type="text" class="form-control @error('nama_mhs') is-invalid @enderror" id="nama_mhs"
                    name="nama_mhs" value="{{ old('nama_mhs') }}">
                    <span class="text-danger">{{ $errors->first('nama_mhs') }}</span> <!--menampilkan error id dari nama-->
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="prodi">Prodi</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prodi" id="Teknik_Informatika" value="Teknik Informatika" 
                        {{ old('prodi') === 'Teknik Informatika' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Teknik_Informatika">Teknik Informatika</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prodi" id="Sistem_Informasi" value="Sistem Informasi" 
                        {{ old('prodi') === 'Sistem Informasi' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Sistem_Informasi">Sistem Informasi</label>
                    </div>                    
                    <span class="text-danger">{{ $errors->first('prodi') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="asal">Asal</label>
                    <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal"
                    name="asal" value="{{ old('asal') }}">
                    <span class="text-danger">{{ $errors->first('asal') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
