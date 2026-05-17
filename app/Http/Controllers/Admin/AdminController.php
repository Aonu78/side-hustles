<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use App\Repositories\FinanceToolsRepository;
use App\Repositories\HustlesRepository;
use App\Repositories\ResourcesRepository;
use App\Repositories\HomeRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(
        private HomeRepository $homeRepository,
        private BlogRepository $blogRepository,
        private FinanceToolsRepository $financeRepository,
        private HustlesRepository $hustlesRepository,
        private ResourcesRepository $resourcesRepository
    ) {}

    public function dashboard()
    {
        $stats = $this->homeRepository->adminStats();

        return view('admin.dashboard', compact('stats'));
    }

    public function postsList(Request $request)
    {
        $posts = $this->blogRepository->allPaginated(10);
        if ($search = $request->search) {
            $posts = $this->blogRepository->search($search);
        }
        return view('admin._posts-list', compact('posts'))->render();
    }
}


