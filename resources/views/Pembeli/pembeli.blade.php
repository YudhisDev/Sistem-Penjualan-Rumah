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
                    Tambah Pembeli
                </button>
            </div>
            <div class="card mb-4 mt-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Pembeli
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kelamin</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Kode Pos</th>
                                <th>Navigasi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        ?>
                        <tbody>
                            @foreach ($pembeli as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kelamin }}</td>
                                    <td>{{ $item->umur }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->kode_pos }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target='#editModal{{ $item->nik }}' class="btn btn-outline-warning"
                                            role="button"><i class="fas fa-pencil"></i>
                                            Edit</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->nik }}"><i class="fas fa-trash"></i>
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
    @include('Pembeli.modals.create')
    @include('Pembeli.modals.update')
    @include('Pembeli.modals.delete')
@endsection
