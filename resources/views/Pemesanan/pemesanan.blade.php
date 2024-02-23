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
                    Tambah Pemesanan
                </button>
            </div>
            <div class="container-fluid px-4">
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pembeli
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No Pesanan</th>
                                    <th>Nama Pembeli</th>
                                    <th>Nama Rumah</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Status Pembelian</th>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>
    @include('Pemesanan.modals.create')
@endsection
