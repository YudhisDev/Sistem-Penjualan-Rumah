<!-- Modal Update-->
@foreach ($cicilan as $item => $value)
    <div class="modal fade" id="editModal{{ $value->kode_kredit }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="/kredit/{{ $value->kode_kredit }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kode_kredit" class="form-label">Kode Cicilan</label>
                            <input type="text" name="kode_kredit" class="form-control" id="kode_kredit"
                                value="{{ $value->kode_kredit }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                value="{{ $value->deskripsi }}">
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="text" name="waktu" class="form-control" id="waktu"
                                value="{{ $value->waktu }}">
                            @error('waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bunga" class="form-label">Bunga</label>
                            <input type="text" name="bunga" class="form-control" id="bunga"
                                value="{{ $value->bunga }}">
                            @error('bunga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Data</button>
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
