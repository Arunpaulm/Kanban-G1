<?php

use App\Http\Livewire as Livewire;
use App\Http\Controllers as controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});
Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/users', Livewire\Users::class)->name('user')->middleware('permission:user-list');
    Route::get('/users/{id}/profile', Livewire\Profile::class)->name('profile');

    Route::get('/roles', Livewire\Roles::class)->name('role')->middleware('permission:role-list');

    Route::group(['prefix' => 'project', 'as' => 'project.'], function (){
        Route::get('{slug}/details', Livewire\ProjectDetails::class)->name('details')->middleware('permission:view-project');
        Route::get('{slug}/board', Livewire\Board::class)->name('board')->middleware('permission:view-board');
    });
    Route::resource('project', 'App\Http\Controllers\ProjectController');

    Route::get('/permissions', Livewire\Permissions::class)->name('permissions')->middleware('permission:assign-role-permission');

    Route::get('/home', [controller\HomeController::class, 'index'])->name('home');
});

