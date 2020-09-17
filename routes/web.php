<?php

use Illuminate\Support\Facades\Route;

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

Route::domain('admin.davewritescode.loc')->name('admin.')->group(function() {
	Auth::routes();
	Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
	Route::resources([
		'projects' => App\Http\Controllers\ProjectController::class,
		'project-sections' => App\Http\Controllers\ProjectSectionController::class,
		'media-gallery' => App\Http\Controllers\MediaGalleryController::class,
		'media' => App\Http\Controllers\MediaController::class,
		'access-codes' => App\Http\Controllers\AccessCodeController::class,
	]);
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('public.about');
// Route::get('/uses', [App\Http\Controllers\HomeController::class, 'uses'])->name('public.uses');

Route::group(['middleware' => [App\Http\Middleware\ProtectedByAccessCode::class]], function() {
	Route::get('/projects', [App\Http\Controllers\PublicProjectController::class, 'index'])->name('public.projects.index');
	Route::get('/projects/{project}', [App\Http\Controllers\PublicProjectController::class, 'show'])->name('public.projects.show');
	Route::get('/media/{media}.{extension}', [App\Http\Controllers\MediaController::class, 'show'])->name('public.media.show');
});

Route::get('/authenticate', [App\Http\Controllers\PublicAccessCodeController::class, 'index'])->name('public.access-code');
Route::post('/authenticate', [App\Http\Controllers\ActiveGuestController::class, 'store']);




