<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail {
  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = ['name', 'email', 'password'];
  protected $hidden = ['password', 'remember_token'];
  protected $casts = ['email_verified_at' => 'datetime'];

  public function posts() : HasMany { return $this->hasMany(Post::class); }
  public function comments() : HasMany { return $this->hasMany(Comment::class); }
  public function likes() : HasMany { return $this->hasMany(Like::class); }
  public function roles() : BelongsToMany { return $this->belongsToMany(Role::class)->withTimestamps(); }
  public function profileImages() : HasMany { return $this->hasMany(ProfileImage::class, 'user_id', 'id'); }
}
