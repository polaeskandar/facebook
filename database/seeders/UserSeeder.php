<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
  public function run() {
    // Fetching Roles
    $ownerRole = Role::whereRole('Owner')->first();
    $adminRole = Role::whereRole('Admin')->first();
    $moderatorRole = Role::whereRole('Moderator')->first();
    $userRole = Role::whereRole('User')->first();

    // Creating owner
    $owner = User::factory()->owner()->create();
    $owner->roles()->attach($ownerRole);

    // Creating users
    for ($i = 0; $i < 100; $i++) {
      $user = User::factory()->has(Post::factory(3))->create();
      $user->roles()->attach($userRole);
    }

    // Creating admins
    for ($i = 0; $i < 5; $i++) {
      $user = User::factory()->has(Post::factory())->create();
      $user->roles()->attach($adminRole);
    }

    // Creating moderators
    for ($i = 0; $i < 20; $i++) {
      $user = User::factory()->has(Post::factory(2))->create();
      $user->roles()->attach($moderatorRole);
    }
  }
}
