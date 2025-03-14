@if(isset($mapel))
    <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-warning btn-sm">Edit</a>
    
    <form id="delete-form-{{ $mapel->id }}" action="{{ route('mapel.delete', $mapel->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $mapel->id }})">Delete</button>
    </form>
@endif