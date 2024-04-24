<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\depanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\skillController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\RouteNotDefinedSolutionProvider;
use App\Http\Controllers\pengaturanHalamanController;

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


Route::get('/', [depanController::class,"index"])->name('home.index');
route::redirect('home', 'dashboard' ); 


Route::get('/auth', [authController::class, "index"])->name('login');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "Callback"])->middleware('guest');
Route::get('/dashboard', function () {
});
Route::get('/auth/logout', [authController::class,"logout"])->middleware('auth');

Route::prefix('/dashboard')->middleware('auth')->group(
    function () {
        Route:: get('/',[halamanController::class,'index']);
        Route::resource('halaman',halamanController::class);
        Route::resource('experience',experienceController::class);
        Route::get('/skill',[skillController::class,'index'])->name('skill.index');
        Route::post('/skill',[skillController::class,'update'])->name('skill.update');
        Route::get('/profile',[profileController::class,'index'])->name('profile.index');
        Route::post('/profile',[profileController::class,'update'])->name('profile.update');
        Route::get('pengaturanhalaman',[pengaturanHalamanController::class,'index'])->name('pengaturanhalaman.index');
        Route::post('pengaturanhalaman',[pengaturanHalamanController::class,'update'])->name('pengaturanhalaman.update');

    });
    

