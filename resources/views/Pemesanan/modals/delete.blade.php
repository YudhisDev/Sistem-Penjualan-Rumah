<!-- Modal Hapus-->
@foreach ($pesanan as $item)
    <form action="/pemesanan/{{ $item->id_pesanan }}" method="POST">
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <div class="modal fade" id="deleteModal{{ $item->id_pesanan }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hapus Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
