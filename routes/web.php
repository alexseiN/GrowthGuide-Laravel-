<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\FormBuilder;
use App\Http\Controllers\FormController;

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

Route::get('/form', [FormBuilder::class,'showBuilder'])->name('app.home');
//Route::get('/form', [FormBuilder::class,'showBuilder'])->name('form');

Route::get('/show-form', [FormBuilder::class,'showForm'])->name('show.form');
Route::post('/save-form', [FormBuilder::class,'saveForm'])->name('save.form');
Route::post('/submit-form', [FormBuilder::class,'handleFormRequest'])->name('submit.form');


Route::get('/', [categorycontroller::class,'main']);

Route::get('/service', [categorycontroller::class,'serviceform']);

Route::get('/categories&services', [categorycontroller::class,'showcategories']);
Route::get('/admin', [categorycontroller::class, 'index']);
Route::get('/category-edit/{id}', [categorycontroller::class, 'editcategory']);
Route::post('/add-category', [categorycontroller::class, 'addcategory']);
Route::post('/update-category/{id}', [categorycontroller::class, 'updatecategory']);
Route::get('/category-delete/{id}', [categorycontroller::class, 'categorydelete']);
Route::post('/add-service', [categorycontroller::class, 'addservice']);
Route::get('/service-edit/{id}', [categorycontroller::class, 'editservice']);
Route::post('/update-service/{id}', [categorycontroller::class, 'updateservice']);
Route::get('/service-delete/{id}', [categorycontroller::class, 'servicedelete']);

Route::post('/form/respond', [FormController::class, 'respond'])->name('form.respond');
Route::get('/forms/responses', [FormController::class, 'allResponses'])->name('forms.responses');