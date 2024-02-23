@extends('layout.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
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
                        Tambah Pemesanan
                    </button>
                </div>
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pemesanan
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th colspan="200">No Pesanan</th>
                                    <th>Nama Pembeli</th>
                                    <th>Nama Rumah</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Status Pembelian</th>
                                    <th>Navigasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $item)
                                    <tr>
                                        <td>{{ $item->id_pesanan }}</td>
                                        <td>{{ $item->pembeli->nama }}</td>
                                        <td>{{ $item->rumah->nama_rumah }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target='#editModal{{ $item->id_pesanan }}'
                                                class="btn btn-outline-warning" role="button"><i class="fas fa-pencil"></i>
                                                Edit</button>
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->id_pesanan }}"><i
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
    @include('Pemesanan.modals.create')
    @include('Pemesanan.modals.update')
@endsection
