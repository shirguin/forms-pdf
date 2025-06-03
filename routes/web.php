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

Route::get('/form-i-589/all/{id}', [FormI589Controller::class, 'getById'])->name('form-i-589-detail');
Route::get('/form-i-589/all/{id}/update', [FormI589Controller::class, 'updateForm'])->name('form-i-589-update');
Route::post('/form-i-589/all/{id}/update', [FormI589Controller::class, 'updateFormSubmit'])->name('form-i-589-update-submit');
Route::get('/form-i-589/all/{id}/delete', [FormI589Controller::class, 'deleteForm'])->name('form-i-589-delete');
Route::get('/form-i-589/all', [FormI589Controller::class, 'getAll'])->name('form-i-589-list');
Route::post('/form-i-589/submit', [FormI589Controller::class, 'submit'])->name('form-i-589-submit');
