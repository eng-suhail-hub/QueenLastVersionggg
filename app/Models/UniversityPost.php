<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasPublicId;
class UniversityPost extends Model
{
    /** @use HasFactory<\Database\Factories\UniversityPostFactory> */
    use HasFactory,HasPublicId;

    protected $fillable = [
        'public_id',
        'title',
        'content',
        'university_id',
    ];
    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_likes', 'university_posts_id', 'user_id')
            ->withTimestamps();
    }

    public function likesCount()
    {
        return $this->post_likes()->count();
    }
}
