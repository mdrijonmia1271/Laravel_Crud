<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactInfo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileEditController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

//frontend Route --------------------
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{slug}', [FrontendController::class, 'productDetails']);



//  Email Verification Route Started---------------------------------
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
//  Email Verification Route End-------------------------------------


//Deashboard Route-----------------
Route::get('/dashboard', [Controller::class, 'deshboardIndex'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('send/newslatter', [Controller::class, 'sendNewslatter']);

// ContactInfo route-------------------
Route::get('/contact', [ContactInfo::class, 'contact']);
Route::post('/contact/insert', [ContactInfo::class, 'contactInsert']);
Route::get('contact/message', [ContactInfo::class, 'contactMessage']);
Route::get('contact/upload/download/{contact_id}', [ContactInfo::class, 'contactUploadDownload']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//CategoryController Route-------
Route::get('category/index', [CategoryController::class, 'index']);
Route::get('add/category/index', [CategoryController::class, 'addIndex']);
Route::post('add/category', [CategoryController::class, 'create']);
Route::get('edit/category/{id}', [CategoryController::class, 'edit']);
Route::post('update/category', [CategoryController::class, 'update']);
Route::get('delete/category/{id}', [CategoryController::class, 'delete']);
Route::get('deleted/category', [CategoryController::class, 'deletedCategory']);
Route::get('restore/category/{id}', [CategoryController::class, 'restore']);
Route::post('mark/restore-delete', [CategoryController::class, 'markRestore']);
Route::post('mark/delete', [CategoryController::class, 'markDelete']);
Route::get('force/delete/category/{id}', [CategoryController::class, 'forceDelete']);


//Profile Edit Conteroller_02 Route---------
Route::get('user/profile/edit', [UserProfileEditController::class, 'user_profile_edit']);
Route::post('user/profile/update', [UserProfileEditController::class, 'user_profile_update']);
Route::post('user/password/update', [UserProfileEditController::class, 'user_password_update']);
Route::post('profile/photo/change', [UserProfileEditController::class, 'profile_photo_change']);

//Product Resource Controller-----------
Route::resource('product', ProductController::class);


require __DIR__ . '/auth.php';