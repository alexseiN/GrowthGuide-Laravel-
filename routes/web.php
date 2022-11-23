<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\FormBuilder;
use App\Http\Controllers\FormController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileController;

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
Route::get('/service-info', [FormBuilder::class,'showServiceInfo'])->name('app.serviceinfo');
Route::get('/form-dashboard', [FormBuilder::class,'showDashboardBuilder'])->name('app.dashboardform');
//Route::get('/form', [FormBuilder::class,'showBuilder'])->name('form');

Route::get('/show-form', [FormBuilder::class,'showForm'])->name('show.form');
Route::get('/show-dashboardform', [FormBuilder::class,'showDashboardForm'])->name('show.dashboardform')->middleware('auth');
Route::post('/save-form', [FormBuilder::class,'saveForm'])->name('save.form');
Route::post('/save-serviceinfo', [FormBuilder::class,'saveServiceInfo'])->name('save.serviceinfo');
Route::post('/save-dashboardform', [FormBuilder::class,'saveDashboardForm'])->name('save.dashboardform');
Route::post('/submit-form', [FormBuilder::class,'handleFormRequest'])->name('submit.form');


Route::get('/', [categorycontroller::class,'main'])->name('app.homepage');
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
Route::get('/forms/customers', [FormController::class, 'allCustomers'])->name('forms.customers');

Route::get('razorpay-payment-page', [RazorpayPaymentController::class, 'response'])->name('payment_response.page');
Route::post('razorpay-payment-page', [RazorpayPaymentController::class, 'index'])->name('payment.page');
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::post('/signin', [LoginController::class, 'index'])->name('app.signin');
Route::get('/signout', [LoginController::class, 'logout'])->name('app.signout');
Route::get('/login', [LoginController::class, 'login'])->name('app.login');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/placeorder', [OrderController::class, 'placeOrder'])->name('submit.order');
Route::get('/myorder', [OrderController::class, 'showMyOrder'])->name('show.order');
Route::get('/showOrderResponses', [OrderController::class, 'getOrderResponses'])->name('show.orders');
Route::post('/sendOrderResponses', [OrderController::class, 'SendOrderResponses'])->name('orders.response');
Route::post('/sendOrderMessage', [OrderController::class, 'SendOrderMessage'])->name('orders.sendMessage');
Route::get('/filedownload', [FileController::class, 'filedownload'])->name('file.download');
