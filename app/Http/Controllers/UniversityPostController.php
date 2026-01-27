<?php

namespace App\Http\Controllers;

use App\Models\UniversityPost;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UniversityPostController extends Controller
{
   /**
    * عرض قائمة المقالات/المنشورات
    */
   public function index(Request $request): Response
   {
       $query = UniversityPost::with('university')->latest();

       // Filtering
       if ($request->has('university_id')) {
           $query->where('university_id', $request->university_id);
       }

       if ($request->has('search')) {
           $query->where(function($q) use ($request) {
               $q->where('title', 'like', '%' . $request->search . '%')
                 ->orWhere('content', 'like', '%' . $request->search . '%');
           });
       }

       $posts = $query->get()->map(function ($post) {
           return [
               'public_id' => $post->public_id,
               'title' => $post->title,
               'content' => $post->content,
               'university_id' => $post->university_id,
               'university' => [
                   'public_id' => $post->university->public_id,
                   'name' => $post->university->name,
               ],
               'likes_count' => $post->likesCount(),
               'created_at' => $post->created_at->toISOString(),
               'updated_at' => $post->updated_at->toISOString(),
           ];
       });

       return Inertia::render('Posts', [
           'postsData' => $posts,
       ]);
   }

   /**
    * عرض تفاصيل منشور معين
    */
   public function show(UniversityPost $universityPost): Response
   {
       $universityPost->load('university');

       $postData = [
           'public_id' => $universityPost->public_id,
           'title' => $universityPost->title,
           'content' => $universityPost->content,
           'university_id' => $universityPost->university_id,
           'university' => [
               'public_id' => $universityPost->university->public_id,
               'name' => $universityPost->university->name,
           ],
           'likes_count' => $universityPost->likesCount(),
           'created_at' => $universityPost->created_at->toISOString(),
           'updated_at' => $universityPost->updated_at->toISOString(),
       ];

       return Inertia::render('PostDetails', [
           'public_id' => $universityPost->public_id,
           'postData' => $postData,
       ]);
   }
}
