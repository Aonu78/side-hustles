<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function posts(Request $request)
    {
        $posts = $request->has('search') ? 
            $this->blogRepository->search($request->search) : 
            $this->blogRepository->allPaginated();

        return view('admin._posts-list', compact('posts'))->render();
    }
}

