<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

  public function uploadPostImage(Request $request) {
    $request->validate(['image' => ['required', 'image']]);

    $file = $request->file('image');
    $fileName = time() . '_' . Str::random(10) . '_' . $file->getClientOriginalExtension() . '.' . $file->guessClientExtension();
    $path = Storage::putFileAs('public/posts-images', $file, $fileName);
    $pathArray = explode('/', $path);
    $pathArray[0] = "storage";
    array_unshift($pathArray, env('APP_URL', 'http://127.0.0.1:8000'));
    $path = implode('/', $pathArray);

    return ['image' => $path];
  }

  public function getPosts(Request $request) {}

  public function likeUnlike(Request $request) {
    $validated = $request->validate([
      'post_id' => ['required'],
      'user_id' => ['required']
    ]);

    $like = Like::where('post_id', '=', $validated['post_id'])->where('user_id', '=', $validated['user_id'])->first();

    if ($like) $like->delete();
    else Like::create(['post_id' => $validated['post_id'], 'user_id' => $validated['user_id']]);

    return ['status' => 'Response'];
  }

  public function checkLike(Request $request) {
    $validated = $request->validate([
      'post_id' => ['required'],
      'user_id' => ['required']
    ]);

    $like = Like::where('post_id', '=', $validated['post_id'])->where('user_id', '=', $validated['user_id'])->first();

    if ($like) return ['liked' => true];
    else return ['liked' => false];
  }
}
