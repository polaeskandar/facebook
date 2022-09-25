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

    Post::create($validated);
    return redirect()->back();
  }
}
