@extends('layout.main')
@section('content')
    <main>
        <div class="container-fluid px-2 mt-5">
            @if (session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('edit'))
                <div class="alert alert-warning" role="alert">
                    {{ session('edit') }}
                </div>
            @elseif(session()->has('delete'))
                <div class="alert alert-danger" role="alert">
                    {{ session('delete') }}
                </div>
            @endif
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah Rumah
                </button>
            </div>
            <div class="card mb-4 mt-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Rumah
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No Rumah</th>
                                <th>Nama Rumah</th>
                                <th>Varian</th>
                                <th>Jumlah Tersedia</th>
                                <th>Harga</th>
                                <th>Navigasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rumah as $item)
                                <tr>
                                    <td>{{ $item->kode_rumah }}</td>
                                    <td>{{ $item->nama_rumah }}</td>
                                    <td>{{ $item->varian }}</td>
                                    <td>{{ $item->available }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target='#editModal{{ $item->kode_rumah }}'
                                            class="btn btn-outline-warning" role="button"><i class="fas fa-pencil"></i>
                                            Edit</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->kode_rumah }}"><i
                                                class="fas fa-trash"></i>
                                            Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @include('Rumah.modals.create')
    @include('Rumah.modals.update')
    @include('Rumah.modals.delete')
@endsection
