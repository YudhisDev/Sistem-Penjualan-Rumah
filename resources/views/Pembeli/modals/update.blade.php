<!-- Modal Update-->
@foreach ($pembeli as $item => $value)
    <div class="modal fade" id="editModal{{ $value->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="/pembeli/{{ $value->nik }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK Pembeli</label>
                            <input type="text" name="nik" class="form-control" id="nik"
                                value="{{ $value->nik }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="{{ $value->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kelamin Pembeli</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kelamin" id="laki-laki"
                                            value="laki-laki" {{ $value->kelamin == 'laki-laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kelamin" id="perempuan"
                                            value="perempuan" {{ $value->kelamin == 'perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur Pembeli</label>
                            <input type="text" name="umur" class="form-control" id="umur"
                                value="{{ $value->umur }}">
                            @error('umur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Pembeli</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3"><?= $value->alamat ?></textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kode_pos" class="form-label">Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" id="kode_pos"
                                value="{{ $value->kode_pos }}">
                            @error('kode_pos')
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
