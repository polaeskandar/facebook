<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
  public function definition() {
    return [
      'body' => fake()->realText(500),
      'created_at' => now()->subDays(rand(0, 7)),
      'updated_at' => now()->subDays(rand(0, 7)),
    ];
  }
}
