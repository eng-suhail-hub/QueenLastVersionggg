<?php

namespace App\Http\Controllers\PostLike;

use App\Http\Controllers\Controller;
use App\Models\UniversityPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
  public function taggle(UniversityPost $universitypost)
  {
    $user = Auth::user();
    $liked = $universitypost->likes()->where('user_id', $user->id)->exists();


    if ($liked) {
      $universitypost->likes()->detach($user->id);
      return response()->json([
        'status' => 'unliked',
        'likes_count' => $universitypost->likesCount()
        // 'likes_count' => $universitypost->likes()->count();
      ]);
    } else {
      $universitypost->likes()->attach($user->id);
            return response()->json([
        'status' => 'liked',
        'likes_count' => $universitypost->likesCount()
   ]);
    }
  }
}
