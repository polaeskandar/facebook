<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
  public function createPost(Request $request) {
    $validated = $request->validate([
      'body' => ['required'],
      'user_id' => ['required']
    ]);

    $cleanPost = preg_replace("/<iframe.*?>/", "", $validated['body']);
    $cleanPost = preg_replace("/<script(.*?)>(.*?)<\/script>/", "", $cleanPost);

    Post::create([
      'body' => $cleanPost,
      'user_id' => $validated['user_id']
    ]);

    return redirect()->back();
  }
}
