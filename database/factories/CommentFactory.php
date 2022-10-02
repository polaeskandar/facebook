<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory {
  public function definition() {
    return [
      'body' => fake()->text(100),
//      'user_id' => '3',
    ];
  }
}
