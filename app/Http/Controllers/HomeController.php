<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Hustle;
use App\Models\Resource;
use App\Models\Tool;
use App\Repositories\HomeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct(
        private HomeRepository $homeRepository
    ) {}

    public function index()
    {
        $hustles = $this->homeRepository->getFeaturedHustles();
        $tools = $this->homeRepository->getFeaturedTools();
        $posts = $this->homeRepository->getRecentPosts();
        $resources = $this->homeRepository->getFeaturedResources();

        return view('resources.index', compact('hustles', 'tools', 'posts', 'resources'));
    }
    public function finance_tools()
    {
        $hustles = $this->homeRepository->getFeaturedHustles();
        $tools = $this->homeRepository->getFeaturedTools();
        $posts = $this->homeRepository->getRecentPosts();
        $resources = $this->homeRepository->getFeaturedResources();

        return view('resources.finance-tools', compact('hustles', 'tools', 'posts', 'resources'));
    }
    public function resources()
    {
        $hustles = $this->homeRepository->getFeaturedHustles();
        $tools = $this->homeRepository->getFeaturedTools();
        $posts = $this->homeRepository->getRecentPosts();
        $resources = $this->homeRepository->getFeaturedResources();

        return view('resources.resources', compact('hustles', 'tools', 'posts', 'resources'));
    }
    public function side_hustles()
    {
        $hustles = $this->homeRepository->getSideHustles();
        $tools = $this->homeRepository->getFeaturedTools();
        $posts = $this->homeRepository->getRecentPosts();
        $resources = $this->homeRepository->getFeaturedResources();

        return view('resources.side-hustles', compact('hustles', 'tools', 'posts', 'resources'));
    }

    public function hustleShow(string $slug)
    {
        $hustle = Hustle::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $similarHustles = Hustle::with('category')
            ->where('id', '!=', $hustle->id)
            ->where('hustle_category_id', $hustle->hustle_category_id)
            ->orderBy('revenue_potential', 'desc')
            ->limit(4)
            ->get();

        return view('hustles.show', compact('hustle', 'similarHustles'));
    }

    public function financeToolShow(string $slug)
    {
        $tool = Tool::with(['category', 'results'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('finance-tools.show', compact('tool'));
    }

    public function resourceShow(string $slug)
    {
        $resource = Resource::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $popularResources = Resource::with('category')
            ->where('id', '!=', $resource->id)
            ->orderBy('downloads_count', 'desc')
            ->limit(4)
            ->get();

        return view('resources.show', compact('resource', 'popularResources'));
    }

    public function resourceDownload(Request $request, string $slug)
    {
        $resource = Resource::where('slug', $slug)->firstOrFail();

        $resource->increment('downloads_count');

        Download::create([
            'resource_id' => $resource->id,
            'user_id' => $request->user()?->id,
            'ip_address' => $request->ip(),
        ]);

        if (Storage::disk('public')->exists($resource->file_path)) {
            return Storage::disk('public')->download($resource->file_path);
        }

        $publicPath = public_path($resource->file_path);
        if (is_file($publicPath)) {
            return response()->download($publicPath);
        }

        $fileName = Str::slug($resource->title).'.txt';
        $content = implode(PHP_EOL, [
            $resource->title,
            '',
            'This free resource is available from Hustle Fundamentals.',
            'Category: '.($resource->category?->name ?? 'General'),
            'Downloaded: '.now()->toDateTimeString(),
            '',
            'Use this as a starter worksheet, then customize it for your own numbers and workflow.',
        ]);

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
        ]);
    }
}

