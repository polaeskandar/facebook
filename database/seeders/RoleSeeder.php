<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {
  public function run() {
    // Creating roles
    Role::create(['role' => 'Owner']);
    Role::create(['role' => 'Admin']);
    Role::create(['role' => 'Moderator']);
    Role::create(['role' => 'User']);
  }
}
