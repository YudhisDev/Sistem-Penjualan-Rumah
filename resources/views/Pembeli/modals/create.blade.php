<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form action="/pembeli" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK Pembeli</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            id="nik" placeholder="Contoh: 112443098277001">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pembeli</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" placeholder="Contoh: Wahyono Suroso">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kelamin" class="form-label">Kelamin Pembeli</label>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelamin" id="laki-laki"
                                        value="laki-laki" required>
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelamin" id="perempuan"
                                        value="perempuan" required>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur Pembeli</label>
                        <input type="text" name="umur" class="form-control @error('umur') is-invalid @enderror"
                            id="umur" placeholder="Contoh: 34">
                        @error('umur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pembeli</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3"
                            placeholder="Contoh: Jalan Sudirman No.45 Jakarta Utara"></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="text" name="kode_pos"
                            class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos"
                            placeholder="Contoh: 502330">
                        @error('kode_pos')
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
@if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#createModal').modal('show');
        });
    </script>
@endif
