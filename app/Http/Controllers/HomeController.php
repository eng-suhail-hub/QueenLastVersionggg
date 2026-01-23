<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UniversityController extends Controller
{
   /**
    * عرض قائمة الجامعات
    */
   public function index(Request $request): Response
   {
       $query = University::where('status', 'approved');

       // Filtering
       if ($request->has('location')) {
           $query->where('location', 'like', '%' . $request->location . '%');
       }

       if ($request->has('type')) {
           $query->where('type', $request->type);
       }

       if ($request->has('search')) {
           $query->where(function($q) use ($request) {
               $q->where('name', 'like', '%' . $request->search . '%')
                 ->orWhere('description', 'like', '%' . $request->search . '%');
           });
       }

       $universities = $query->get()->map(function ($university) {
           return [
               'public_id' => $university->public_id,
               'name' => $university->name,
               'email' => $university->email,
               'description' => $university->description,
               'location' => $university->location,
               'address' => $university->address,
               'phone' => $university->phone,
               'type' => $university->type,
               'status' => $university->status,
               'image_path' => $university->image_path,
               'image_background' => $university->image_background,
               'avatar_url' => $university->avatar_url,
           ];
       });

       return Inertia::render('Universities', [
           'universitiesData' => $universities,
       ]);
   }

   /**
    * عرض تفاصيل جامعة معينة
    */
   public function show(University $university): Response
   {
       $university->load([
           'images' => function($query) {
               $query->where('is_active', true)->orderBy('priority');
           },
           'universityMajors' => function($query) {
               $query->where('published', true);
           },
           'universityMajors.major.college'
       ]);

       $universityData = [
           'public_id' => $university->public_id,
           'name' => $university->name,
           'email' => $university->email,
           'description' => $university->description,
           'location' => $university->location,
           'address' => $university->address,
           'phone' => $university->phone,
           'type' => $university->type,
           'status' => $university->status,
           'image_path' => $university->image_path,
           'image_background' => $university->image_background,
           'avatar_url' => $university->avatar_url,
           'images' => $university->images->map(function ($image) {
               return [
                   'public_id' => $image->public_id,
                   'path_main' => $image->path_main,
                   'path_thumb' => $image->path_thumb,
                   'priority' => $image->priority,
                   'is_active' => $image->is_active,
               ];
           }),
           'universityMajors' => $university->universityMajors->map(function ($universityMajor) {
               return [
                   'public_id' => $universityMajor->public_id,
                   'number_of_seats' => $universityMajor->number_of_seats,
                   'admission_rate' => $universityMajor->admission_rate,
                   'study_years' => $universityMajor->study_years,
                   'tuition_fee' => $universityMajor->tuition_fee,
                   'published' => $universityMajor->published,
                   'major' => [
                       'public_id' => $universityMajor->major->public_id,
                       'name' => $universityMajor->major->name,
                       'description' => $universityMajor->major->description,
                       'designation_jobs' => $universityMajor->major->designation_jobs,
                       'study_years' => $universityMajor->major->study_years,
                       'college' => [
                           'public_id' => $universityMajor->major->college->public_id,
                           'name' => $universityMajor->major->college->name,
                           'description' => $universityMajor->major->college->description,
                           'image_path' => $universityMajor->major->college->image_path,
                       ],
                   ],
               ];
           }),
       ];

       return Inertia::render('UniversityDetails', [
           'public_id' => $university->public_id,
           'universityData' => $universityData,
       ]);
   }
}
