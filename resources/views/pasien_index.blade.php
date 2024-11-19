@extends('layouts.app_modern', ['tittle' => 'Data Pasien '])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Data Pasien</h5>
            <div class="row mb-3 mt-3">
                <div class="coll -md-6">
                    <a href="/pasien/create" class="btn btn-primary btn-sm">Tambah Pasien</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Pasien</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl Buat</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_pasien }}</td>
                            <td>
                                @if ($item->foto)
                                    <a href="{{ \Storage::url($item->foto) }}" target="blank">
                                        <img src="{{ \Storage::url($item->foto) }}" width="100px">
                                    </a>
                                @endif
                                {{ $item->nama }}

                            </td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>

                                <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ml-2"
                                        onclick="return confirm('yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $pasien->links() !!}
        </div>
    </div>
@endsection
