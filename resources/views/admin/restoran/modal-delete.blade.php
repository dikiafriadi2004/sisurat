@foreach ($pajakrestoran as $item)
    <!-- Modal -->
    <div class="modal fade" id="modalDeleteRestoran{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete {{ $item->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('restoran.destroy', $item->id) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        Apakah Anda Yakin untuk menghapus data, {{ $item->nama_pemilik }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
