<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    DashboardController,
	PostController,
    SocialController,
    UserController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/
#Rutas para login con facebook
Route::get('/auth/facebook', [SocialController::class, 'facebookRedirect'])->name('login.fb');
Route::get('/auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

#Rutas para login con github
Route::get('/auth/github', [SocialController::class, 'githubRedirect'])->name('login.gh');
Route::get('/auth/github/callback', [SocialController::class, 'loginWithGithub']);

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/language/{language}', function ($language) {
	session()->put('locale', $language);
	return redirect()->back();
})->name('language');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    

    Route::post('/posts/uploadFile', [PostController::class, 'uploadFile'])->name('posts.uploadFile');
    Route::resource('posts', PostController::class);
});