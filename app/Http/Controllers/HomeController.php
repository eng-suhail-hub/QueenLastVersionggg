<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\UniversityPost;
use App\Models\Student;
use App\Models\College;
use App\Models\Major;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
   /**
    * عرض الصفحة الرئيسية
    */
   public function __invoke(): Response
   {
       // أهم الجامعات
       $featuredUniversities = University::where('status', 'approved')
           ->limit(6)
           ->get()
           ->map(function ($university) {
               return [
                   'public_id' => $university->public_id,
                   'name' => $university->name,
                   'description' => $university->description,
                   'location' => $university->location,
                   'type' => $university->type,
                   'image_path' => $university->image_path,
                   'avatar_url' => $university->avatar_url,
               ];
           });

       // آخر المنشورات
       $latestPosts = UniversityPost::with('university')
           ->latest()
           ->limit(3)
           ->get()
           ->map(function ($post) {
               return [
                   'public_id' => $post->public_id,
                   'title' => $post->title,
                  //  'content' => \Str::limit($post->content, 200),
                   'university' => [
                       'public_id' => $post->university->public_id,
                       'name' => $post->university->name,
                   ],
                   'created_at' => $post->created_at->toISOString(),
               ];
           });

       // إحصائيات
       $stats = [
           'universitiesCount' => University::where('status', 'approved')->count(),
           'studentsCount' => Student::count(),
           'collegesCount' => College::count(),
           'majorsCount' => Major::count(),
       ];

       return Inertia::render('Home', [
           'featuredUniversities' => $featuredUniversities,
           'latestPosts' => $latestPosts,
           'stats' => $stats,
       ]);
   }
}
