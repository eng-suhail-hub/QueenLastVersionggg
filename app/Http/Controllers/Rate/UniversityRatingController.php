<?php

namespace App\Http\Controllers\Rate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniversityRatingController extends Controller
{
    public function store(Request $request, $university)
    {
      $user = Auth::guard('user')->user();
      $university->addStar(
            $request->input('rating'),
            $user,
            [
                'ip'     => $request->ip(),
                'source' => 'web',
            ]
        );
      return back()->with('success', 'Thank you for rating this university!');

    }
}
