<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hustle;
use App\Models\HustleCategory;
use Illuminate\Http\Request;

class HustlesController extends Controller
{
    public function index(Request $request)
    {
        $hustles = Hustle::with('category')->latest();

        if ($search = $request->get('search')) {
            $hustles->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $hustles = $hustles->paginate(10);
        $hustles->appends($request->query());

        return view('admin.hustles.index', compact('hustles'));
    }

    public function create()
    {
        $categories = HustleCategory::orderBy('name')->get();

        return view('admin.hustles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'hustle_category_id' => 'required|exists:hustle_categories,id',
            'description' => 'required|string',
            'revenue_potential' => 'required|numeric|min:0',
            'effort_level' => 'required|in:low,medium,high',
        ]);

        Hustle::create($validated);

        return redirect()->route('admin.hustles.index')->with('success', 'Hustle created.');
    }

    public function show(Hustle $hustle)
    {
        $hustle->load('category');

        return view('admin.hustles.show', compact('hustle'));
    }

    public function edit(Hustle $hustle)
    {
        $categories = HustleCategory::orderBy('name')->get();

        return view('admin.hustles.edit', compact('hustle', 'categories'));
    }

    public function update(Request $request, Hustle $hustle)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'hustle_category_id' => 'required|exists:hustle_categories,id',
            'description' => 'required|string',
            'revenue_potential' => 'required|numeric|min:0',
            'effort_level' => 'required|in:low,medium,high',
        ]);

        $hustle->update($validated);

        return redirect()->route('admin.hustles.index')->with('success', 'Hustle updated.');
    }

    public function destroy(Hustle $hustle)
    {
        $hustle->delete();

        return redirect()->route('admin.hustles.index')->with('success', 'Hustle deleted.');
    }
}
