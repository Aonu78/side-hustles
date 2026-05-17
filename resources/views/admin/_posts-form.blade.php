<div id="post-form">
    <form method="POST" action="{{ route('admin.posts.store') }}" hx-post="{{ route('admin.posts.store') }}" hx-target="#post-list" hx-swap="innerHTML">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" rows="8" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">Select category</option>
                        @foreach(\App\Models\Category::all() as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 1) ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">
                        Published
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-save"></i> Save Post
                </button>
            </div>
        </div>
    </form>
</div>
