<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormI589Controller;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/form-i-589', function () {
    return view('form-i-589');
})->name('form-i-589');

Route::get('/form-i-589/all', [FormI589Controller::class, 'allData'])->name('form-i-589-data');
Route::post('/form-i-589/submit', [FormI589Controller::class, 'submit'])->name('form-i-589-submit');
