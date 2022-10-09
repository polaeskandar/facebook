<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

  /**
   * Create a new post.
   *
   * @param Request $request
   * @return array
   * @version v1.0.0
   * @since v1.0.0
   */
  public function createPost(Request $request): array {
    $validated = $request->validate([
      'body' => ['required'],
      'user_id' => ['required'],
    ]);

    Post::create([
      'body' => $validated['body'],
      'user_id' => $validated['user_id']
    ]);

    $postsDocument = view('components.posts', [
      'posts' => Post::with(['comments', 'comments.user', 'user'])->orderBy('created_at', 'desc')->get(),
    ])->render();

    return ['posts' => $postsDocument];
  }
}
