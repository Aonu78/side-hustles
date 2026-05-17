<div class="btn-group btn-group-sm" role="group">
    <a href="#" class="btn btn-outline-primary" onclick="loadItem({{ $id ?? 'id' }})" title="View">
        <i class="bi bi-eye"></i>
    </a>
    <a href="#" class="btn btn-outline-warning" onclick="editItem({{ $id ?? 'id' }})" title="Edit">
        <i class="bi bi-pencil"></i>
    </a>
    <form method="POST" action="#" class="d-inline" onsubmit="return confirm('Delete?')">
        @csrf @method('DELETE')
        <button class="btn btn-outline-danger" type="submit" title="Delete">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>

<script>
function loadItem(id) { /* HTMX or JS */ }
function editItem(id) { /* HTMX or JS */ }
</script>

