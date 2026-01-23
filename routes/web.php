<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\PostLike\PostLikeController;
use App\Http\Controllers\Rate\UniversityRatingController;

// use App\Http\Controllers\HomeController;

// Route::get('/', HomeController::class)->name('home');



// Route::get('/', function () {
//     return Inertia::render('welcome', [
//         'canRegister' => Features::enabled(Features::registration()),
//     ]);
// })->name('home');




Route::get('/', function () {
    return Inertia::render('Home', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);})->name('home');



Route::get('/universities', function () {
    return Inertia::render('Universities', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('/universities');


Route::get('/colleges', function () {
    return Inertia::render('Colleges', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('colleges');

Route::get('/articles', function () {
    return Inertia::render('Articles', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('articles');

Route::get('/guidance', function () {
    return Inertia::render('Guidance', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('guidance');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

        Route::post('/universities/{university}/rate', [UniversityRatingController::class, 'store']);
    Route::post('/universityposts/{universitypost}/taggle-like', [PostLikeController::class, 'taggle']);
});

require __DIR__.'/settings.php';

// Allow GET requests to Boost browser logs endpoint to avoid MethodNotAllowed
// The vendor package registers POST at the same path; this GET handler prevents accidental GET errors.
// Route::get('/_boost/browser-logs', function () {
//     return response()->json(['status' => 'ok']);
// });
