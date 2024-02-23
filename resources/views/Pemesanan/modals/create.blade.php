<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form action="/pemesanan" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nama Pemesan</label>
                        <select name="nik" class="form-select @error('nik') is-invalid @enderror"
                            aria-label="Default select example">
                            @foreach ($pembeli as $item)
                                <option value="{{ $item->nik }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_rumah" class="form-label">Rumah Pesanan</label>
                        <select name="kode_rumah" class="form-select @error('kode_rumah') is-invalid @enderror"
                            aria-label="Default select example">
                            @foreach ($rumah as $item)
                                <option value="{{ $item->kode_rumah }}">{{ $item->nama_rumah }}</option>
                            @endforeach
                        </select>
                        @error('kode_rumah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Pesanan</label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                            id="jumlah" placeholder="Contoh: 34">
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
@if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#createModal').modal('show');
        });
    </script>
@endif
