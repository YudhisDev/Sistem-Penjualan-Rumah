<!-- Modal -->
@foreach ($rumah as $item => $value)
    <div class="modal fade" id="editModal{{ $value->kode_rumah }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Rumah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="/rumah/{{ $value->kode_rumah }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kode_rumah" class="form-label">Kode Rumah</label>
                            <input type="text" name="kode_rumah"
                                class="form-control @error('kode_rumah') is-invalid @enderror" id="kode_rumah"
                                value="{{ $value->kode_rumah }}" readonly>
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
                                value="{{ $value->nama_rumah }}">
                            @error('nama_rumah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="varian" class="form-label">Varian</label>
                            <input type="text" name="varian"
                                class="form-control @error('varian') is-invalid @enderror" id="varian"
                                value="{{ $value->varian }}">
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
                                value="{{ $value->available }}">
                            @error('available')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Rumah</label>
                            <input type="text" name="harga"
                                class="form-control @error('harga') is-invalid @enderror" id="harga"
                                value="{{ $value->harga }}">
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
@endforeach
@if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#editModal').modal('show');
        });
    </script>
@endif
