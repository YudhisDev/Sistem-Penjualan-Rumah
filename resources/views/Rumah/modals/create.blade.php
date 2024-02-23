<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rumah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form action="/rumah" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_rumah" class="form-label">Kode Rumah</label>
                        <input type="text" name="kode_rumah"
                            class="form-control @error('kode_rumah') is-invalid @enderror" id="kode_rumah"
                            placeholder="Contoh: 5443">
                        @error('kode_rumah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_rumah" class="form-label">Nama Rumah</label>
                        <input type="text" name="nama_rumah"
                            class="form-control @error('nama_rumah') is-invalid @enderror" id="nama_rumah"
                            placeholder="Contoh: Tipe A7VR">
                        @error('nama_rumah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="varian" class="form-label">Varian</label>
                        <input type="text" name="varian" class="form-control @error('varian') is-invalid @enderror"
                            id="varian" placeholder="Contoh: Luxury 4A">
                        @error('varian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="available" class="form-label">Tersedia sebanyak</label>
                        <input type="text" name="available"
                            class="form-control @error('available') is-invalid @enderror" id="available"
                            placeholder="Contoh: 34">
                        @error('available')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Rumah</label>
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror"
                            id="harga" placeholder="Contoh: 100000000">
                        @error('harga')
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
