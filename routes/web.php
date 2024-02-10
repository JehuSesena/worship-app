<?php

use App\Http\Controllers\Example;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UploadSong;
use App\Http\Livewire\SongsList;
use App\Http\Livewire\CreatePlayList;
use App\Http\Livewire\IndexList;
use App\Http\Livewire\ShowList;
use App\Models\Song;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/songs', SongsList::class)->name('songs.list');
    Route::get('/song', UploadSong::class)->name('song.create');
    Route::get('/playlist', IndexList::class)->name('playlist.index');
    Route::get('/playlist', CreatePlayList::class)->name('playlist.create');
    Route::get('/playlist/{playlistId}', ShowList::class)->name('playlist.show');
    Route::get('/songs/{filename}', [SongController::class, 'show'])->name('song.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
