@extends('mylayout', ['tittle' => 'Data Mahasiswa '])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Data Mahasiswa</h3>
            <div class="row mb-3 mt-3">
                <div class="coll -md-6">
                    <a href="/Mahasiswa/create" class="btn btn-primary btn-sm">Tambah mahasiswa</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nim</th>
                        <th>Prodi</th>
                        <th>Asal</th>
                        <th>Foto</th>
                        <th>Tgl Buat</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_mhs }}</td>
                            <td>{{ $item->nim}}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->asal }}</td>
                            <td>{{ $item->foto }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $mahasiswa->links() !!}
        </div>
    </div>
@endsection
