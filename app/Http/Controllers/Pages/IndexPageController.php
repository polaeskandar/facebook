<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;

class IndexPageController extends Controller {
  public function index(): Factory|View|Application {
    $posts = Post::with(['comments', 'comments.user', 'user'])
      ->orderBy('created_at', 'desc')
      ->take(20)
      ->get();

    return view('index', ['posts' => $posts,]);
  }
}
