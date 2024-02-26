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
                    Tambah Format Cicilan
                </button>
            </div>
            <div class="card mb-4 mt-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Format Cicilan
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Deskripsi</th>
                                <th>Waktu (perbulan)</th>
                                <th>Bunga (%)</th>
                                <th>Navigasi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        ?>
                        <tbody>
                            @foreach ($cicilan as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->kode_kredit }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->waktu }}</td>
                                    <td>{{ $item->bunga }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target='#editModal{{ $item->kode_kredit }}'
                                            class="btn btn-outline-warning" role="button"><i class="fas fa-pencil"></i>
                                            Edit</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->kode_kredit }}"><i
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
    @include('Cicilan.modals.create')
    @include('Cicilan.modals.update')
    @include('Cicilan.modals.delete')
@endsection
