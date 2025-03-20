<a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}" class="btn btn-warning btn-sm">
    <i class="fas fa-edit"></i>
</a>

<form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST" class="display-inline;" 
onsubmit="return confirmDelete(event)" >
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">
    <i class="fas fa-trash"></i>Hapus
</button>
</form>