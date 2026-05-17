<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\FinanceToolsRepository;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function __construct(
        private FinanceToolsRepository $repository
    ) {}

    public function index(Request $request)
    {
        $tools = Tool::with('category')->latest()->paginate(10);
        if ($search = $request->get('search')) {
            $tools = Tool::with('category')
                ->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->latest()
                ->paginate(10);
        }
        $tools->appends($request->query());
        return view('admin.tools.index', compact('tools'));
    }

    public function create()
    {
        $categories = \App\Models\Category::orderBy('name')->get();
        return view('admin.tools.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'calculator_logic' => 'nullable|json',
        ]);

        Tool::create($validated);

        return redirect()->route('admin.tools.index')->with('success', 'Tool created.');
    }

    public function show(Tool $tool)
    {
        return view('admin.tools.show', compact('tool'));
    }

    public function edit(Tool $tool)
    {
        $categories = \App\Models\Category::orderBy('name')->get();
        return view('admin.tools.edit', compact('tool', 'categories'));
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'calculator_logic' => 'nullable|json',
        ]);

        $tool->update($validated);

        return redirect()->route('admin.tools.index')->with('success', 'Tool updated.');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('admin.tools.index')->with('success', 'Tool deleted.');
    }
}

