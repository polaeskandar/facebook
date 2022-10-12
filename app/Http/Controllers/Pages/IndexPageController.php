<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\View\Factory;
use Illuminate\View\View;

/**
 * Class for handling index page requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class IndexPageController extends Controller {

  /**
   * Load the index page.
   *
   * @return Factory|View|Application
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function index(): Factory|View|Application {
    $posts = Post::with(['comments', 'comments.user', 'user'])
      ->orderBy('created_at', 'desc')
      ->take(10)
      ->get();

    return view('index', ['posts' => $posts,]);
  }
}
