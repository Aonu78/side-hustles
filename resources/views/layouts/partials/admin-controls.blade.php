<div class="d-flex justify-content-between align-items-center mb-4 bg-light p-3 rounded-3 shadow-sm">
    <!-- Left: Filters/Dropdown -->
    <div class="d-flex gap-2">
        <select class="form-select form-select-sm" style="width: auto;">
            <option>All</option>
            <option>Published</option>
            <option>Draft</option>
        </select>
        <button class="btn btn-outline-secondary btn-sm">Sort</button>
        {{ $filterSlot ?? '' }}
    </div>

    <!-- Right: Search -->
    <div class="input-group input-group-sm" style="width: 300px;">
        <span class="input-group-text">
            <i class="bi bi-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Search...">
        <button class="btn btn-outline-secondary" type="button">Clear</button>
    </div>
</div>

