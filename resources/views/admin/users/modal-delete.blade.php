@foreach ($users as $item)
    <!-- Modal -->
    <div class="modal fade" id="modalDeleteUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete {{ $item->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        Do you really want to delete these, {{ $item->name }}?
                        <br>
                        This process cannot be undone.
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
