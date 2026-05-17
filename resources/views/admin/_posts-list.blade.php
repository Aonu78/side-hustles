<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ Str::limit($post->title, 50) }}</td>
                <td>{{ $post->category?->name ?? 'Uncategorized' }}</td>
                <td><span class="badge {{ $post->published ? 'bg-success' : 'bg-warning' }}">{{ $post->published ? 'Published' : 'Draft' }}</span></td>
                <td>{{ $post->created_at->format('M d') }}</td>
                <td>
                    @include('layouts.partials.table-actions', ['id' => $post->id])
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-muted">
                    <i class="bi bi-journal-plus fs-1 d-block mb-2"></i>
                    No posts yet. Create one!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $posts->links() }}
