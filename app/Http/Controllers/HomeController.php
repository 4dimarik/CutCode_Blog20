<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $posts = Post::query()
            ->orderByDesc('created_at')
            ->limit(6)
            ->with('postCategories')
            ->get();

        return view('home', compact('posts'));
    }
}
