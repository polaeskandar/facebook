<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
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

    $posts = Post::with(['comments', 'comments.user', 'user'])
      ->orderBy('created_at', 'desc')
      ->take(20)
      ->get();

    $postsDocument = view('posts.posts', ['posts' => $posts])->render();

    return ['posts' => $postsDocument];
  }

  public function getPosts(Request $request) {
    
  }
}
