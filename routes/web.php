<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\ProfileController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

// route for login
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    if (!str_ends_with($googleUser->getEmail(), '@deped.gov.ph')) {
        return redirect('/')->with('not_deped','Only DepEd emails are allowed.');
    }

    // Check if user already exists
    $user = User::where('email', $googleUser->getEmail())->first();

    if (!$user) {
        //return redirect('/')->with('not_reg', 'DepEd email is not registered.');
        // Create new user
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(str()->random(16)), // Dummy password
            'google_id' => $googleUser->getId(),
        ]);
    }

    Auth::login($user);

    return redirect('/dashboard');
});

// route for dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route for urls
Route::resource('urls', UrlController::class)
->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route for get shortener url
Route::get('{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

require __DIR__.'/auth.php';
