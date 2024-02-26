<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form action="/kredit" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_kredit" class="form-label">Kode Format</label>
                        <input type="text" name="kode_kredit"
                            class="form-control @error('kode_kredit') is-invalid @enderror" id="kode_kredit"
                            placeholder="Contoh: C1">
                        @error('kode_kredit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            placeholder="Contoh: Cicilan 12 Bulan">
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu</label>
                        <div class="input-group">
                            <input type="text" name="waktu"
                                class="form-control @error('waktu') is-invalid @enderror" id="waktu"
                                placeholder="Contoh: 12">
                            <span class="input-group-text" id="basic-addon2">Bulan</span>
                            @error('waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bunga" class="form-label">Bunga</label>
                        <div class="input-group">
                            <input type="text" name="bunga"
                                class="form-control @error('bunga') is-invalid @enderror" id="bunga"
                                placeholder="Contoh: 2">
                            <span class="input-group-text" id="basic-addon2">%</span>
                            @error('bunga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
