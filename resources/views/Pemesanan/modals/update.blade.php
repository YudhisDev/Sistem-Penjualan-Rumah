<!-- Modal -->
@foreach ($pesanan as $item => $value)
    <div class="modal fade" id="editModal{{ $value->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="/pemesanan/{{ $value->id_pesanan }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="id_pesanan" class="form-label">Kode Pemesanan</label>
                            <input type="text" name="id_pesanan"
                                class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan"
                                value="{{ $value->id_pesanan }}" readonly>
                            @error('id_pesanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nama Pemesan</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                id="nik" value="{{ $value->pembeli->nama }}" readonly>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="x" class="form-label">Rumah Pesanan</label>
                            <input type="text" name="x"
                                class="form-control @error('kode_rumah') is-invalid @enderror" id="x"
                                value="{{ $value->rumah->nama_rumah }}" readonly>
                            <input type="hidden" name="kode_rumah"
                                class="form-control @error('kode_rumah') is-invalid @enderror" id="kode_rumah"
                                value="{{ $value->kode_rumah }}" hidden>
                            @error('kode_rumah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Pesanan</label>
                            <input type="text" name="jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                value="{{ $value->jumlah }}">
                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pembayaran</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror"
                                aria-label="Default select example">
                                <option value="lunas">Lunas</option>
                                <option value="kredit">Kredit</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#createModal').modal('show');
        });
    </script>
@endif
