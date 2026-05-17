<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        $resources = Resource::with('category')->latest();

        if ($search = $request->get('search')) {
            $resources->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('file_path', 'like', "%{$search}%");
            });
        }

        $resources = $resources->paginate(10);
        $resources->appends($request->query());

        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.resources.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'file_path' => 'required|string|max:255',
            'downloads_count' => 'nullable|integer|min:0',
        ]);

        $validated['downloads_count'] = $validated['downloads_count'] ?? 0;

        Resource::create($validated);

        return redirect()->route('admin.resources.index')->with('success', 'Resource created.');
    }

    public function show(Resource $resource)
    {
        $resource->load('category');

        return view('admin.resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.resources.edit', compact('resource', 'categories'));
    }

    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'file_path' => 'required|string|max:255',
            'downloads_count' => 'nullable|integer|min:0',
        ]);

        $validated['downloads_count'] = $validated['downloads_count'] ?? 0;

        $resource->update($validated);

        return redirect()->route('admin.resources.index')->with('success', 'Resource updated.');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()->route('admin.resources.index')->with('success', 'Resource deleted.');
    }
}
