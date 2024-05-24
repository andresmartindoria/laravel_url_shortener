<?php

//use App\Http\Controllers\UrlController;
use App\Http\Controllers\Api\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['cors']], function () {
    Route::apiResource('urls', UrlController::class);
    //Route::resource('urls', UrlController::class);
    Route::get('{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');
});

#require __DIR__.'/auth.php';
