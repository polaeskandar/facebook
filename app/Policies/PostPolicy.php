<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy {
  use HandlesAuthorization;

  /**
   * Determine whether the user can view any models.
   *
   * @param User $user
   * @return Response|bool
   */
  public function viewAny(User $user) {
    //
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param User $user
   * @param \App\Models\Post $post
   * @return Response|bool
   */
  public function view(User $user, Post $post) {
    //
  }

  /**
   * Determine whether the user can create posts.
   *
   * @param User $user
   * @return Response|bool
   */
  public function create(User $user) : Response|bool {
    return $user->hasVerifiedEmail()
      ? Response::allow()
      : Response::deny('Un allowed to create a new post. Please verify your email');
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param User $user
   * @param \App\Models\Post $post
   * @return Response|bool
   */
  public function update(User $user, Post $post) {
    //
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param User $user
   * @param \App\Models\Post $post
   * @return Response|bool
   */
  public function delete(User $user, Post $post) {
    //
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param User $user
   * @param \App\Models\Post $post
   * @return Response|bool
   */
  public function restore(User $user, Post $post) {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param User $user
   * @param \App\Models\Post $post
   * @return Response|bool
   */
  public function forceDelete(User $user, Post $post) {
    //
  }
}
