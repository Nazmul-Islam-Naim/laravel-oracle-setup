<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMembersController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/about', function () {
    // DB::table('about')->insert([
    //     'title' => 'About Our System',
    //     'subtitle' => 'Team Collaboration Made Easy',
    //     'content' => 'This system is designed to help you manage teams efficiently with powerful features and a simple interface.',
    //     'image_path' => 'images/teamwork.svg',
    //     'created_at' => now(),
    //     'updated_at' => now(),
    // ]);

    // DB::table('about')->where('id', 4)->update([
    //     'title' => "About Team Collaboration",
    // ]);

    return view('about');
})->name('about');

Route::resource('teams', TeamController::class);
Route::resource('team-members', TeamMembersController::class);


