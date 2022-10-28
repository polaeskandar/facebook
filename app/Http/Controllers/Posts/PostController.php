<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Services\FileService;
use Illuminate\Http\Request;

/**
 * Class for handling posts requests.
 *
 * @author Pola Eskandar
 * @version 1.0.0
 * @since 1.0.0
 */
class PostController extends Controller {

  public FileService $fileService;

  public function __construct() {
    $this->fileService = new FileService();
  }

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

  /**
   * Upload a post image to the file storage.
   *
   * @param Request $request
   * @return array
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function uploadPostImage(Request $request) : array {
    $request->validate(['image' => ['required', 'image']]);
    $file = $request->file('image');
    $path = $this->fileService->uploadImage($file, 'public/posts-images');
    return ['image' => $path];
  }

  /**
   * Like or unlike post.
   *
   * @param Request $request
   * @return void
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function likeUnlike(Request $request) : void {
    $validated = $request->validate([
      'post_id' => ['required'],
      'user_id' => ['required']
    ]);

    $postId = $validated['post_id'];
    $userId = $validated['user_id'];
    $like = $this->getLike($postId, $userId);

    if ($like) $like->delete();
    else Like::create(['post_id' => $postId, 'user_id' => $userId]);
  }

  /**
   * Check if the user liked the post or not.
   *
   * @param Request $request
   * @return array
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  public function userLikedPost(Request $request) : array {
    $validated = $request->validate([
      'post_id' => ['required'],
      'user_id' => ['required']
    ]);

    $postId = $validated['post_id'];
    $userId = $validated['user_id'];

    return ['liked' => !!$this->getLike($postId, $userId)];
  }

  /**
   * Get user like to the post
   *
   * @param int $postId
   * @param int $userId
   * @return Like|null
   * @author Pola Eskandar
   * @version 1.0.0
   * @since 1.0.0
   */
  private function getLike(int $postId, int $userId) : Like|null {
    return Like::where('post_id', $postId)->where('user_id', $userId)->first();
  }
}
