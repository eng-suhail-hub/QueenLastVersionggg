<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    /** @use HasFactory<\Database\Factories\PostLikeFactory> */
    use HasFactory;
    protected $fillable = [
        'university_posts_id',
        'user_id',
    ];

  public function likes()
{
    return $this->belongsToMany(User::class, 'PostLike')
        ->withTimestamps();
}

}
