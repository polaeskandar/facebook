<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
  public function definition() {
    return [
      'body' => fake()->text(500),
    ];
  }
}
