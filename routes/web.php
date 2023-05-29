<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Screencast\{PlaylistController, TagController, VideoController};
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
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('playlists')->middleware('permission:create playlists')->group(function() {
        route::get('create',[PlaylistController::class, 'create'])->name('playlists.create');
        route::post('create',[PlaylistController::class, 'store']);
        route::get('{playlist:slug}/edit',[PlaylistController::class, 'edit'])->name('playlists.edit');
        route::put('{playlist:slug}/edit',[PlaylistController::class, 'update']);
        route::delete('{playlist:slug}/delete',[PlaylistController::class, 'destroy'])->name('playlists.delete');

        route::get('table',[PlaylistController::class, 'table'])->name('playlists.table');
    });

    Route::prefix('videos')->middleware('permission:create playlists')->group(function(){
        Route::get('create/into/{playlist:slug}', [VideoController::class, 'create'])->name('videos.create');
        Route::get('table/{playlist:slug}', [VideoController::class, 'table'])->name('videos.table');
        Route::post('create/into/{playlist:slug}', [VideoController::class, 'store']);
        Route::get('edit/{playlist:slug}/{video:unique_video_id}', [VideoController::class, 'edit'])->name('videos.edit');
        Route::put('edit/{playlist:slug}/{video:unique_video_id}', [VideoController::class, 'update']);
        Route::delete('delete/{playlist:slug}/{video:unique_video_id}', [VideoController::class, 'destroy'])->name('videos.delete');
    });

    Route::prefix('tags')->group(function() {
        route::middleware('permission:create tags')->group(function(){
            route::get('table', [TagController::class, 'table'])->name('tags.table');
            route::get('create', [TagController::class, 'create'])->name('tags.create');
            route::post('create', [TagController::class, 'store']);
        });
        route::middleware(['permission:delete tags', 'permission:edit tags'])->group(function(){
            route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('tags.edit');
            route::put('{tag:slug}/edit', [TagController::class, 'update']);
            route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->middleware('permission:delete tags')->name('tags.delete');
        });
    });

});
require __DIR__.'/auth.php';
