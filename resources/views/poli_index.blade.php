@extends('layouts.app_modern', ['tittle' => 'Data Poli '])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Data Poli</h5>
            <div class="row mb-3 mt-3">
                <div class="coll -md-6">
                    <a href="/poli/create" class="btn btn-primary btn-sm">Tambah Poli</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>keterangan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poli as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->biaya }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>

                                <form action="/poli/{{ $item->id }}" method="POST" class="d-inline">
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
            {!! $poli->links() !!}
        </div>
    </div>
@endsection
