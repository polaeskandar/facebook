<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class for handling posts requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class PostController extends Controller {

  /**
   * Create a new post.
   *
   * @param Request $request
   * @return array
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function createPost(Request $request) : array {
    $validated = $request->validate([
      'body' => ['required'],
      'user_id' => ['required'],
    ]);

    $post = Post::create($validated);

    $postDocument = view('posts.post', ['post' => $post, 'postId' => $post->id])->render();
    return ['posts' => $postDocument];
  }

  public function getPosts(Request $request) {}

  public function likeUnlike(Request $request) {
    $validated = $request->validate([
      'post_id' => ['required'],
      'user_id' => ['required']
    ]);


  }
}
