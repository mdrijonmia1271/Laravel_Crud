<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileEditController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    // $users = User::orderBy('id', 'DESC')->get();
    // $users = User::latest()->paginate(2);
    $users = User::latest()->simplePaginate(2);
    $total_users = User::count();
    return view('dashboard', compact('users','total_users'));
})->middleware(['auth', 'verified'])->name('dashboard');

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
Route::get('restore/category/{id}', [CategoryController::class, 'restore']);
Route::post('mark/restore-delete', [CategoryController::class, 'markRestore']);
Route::post('mark/delete', [CategoryController::class, 'markDelete']);
Route::get('force/delete/category/{id}', [CategoryController::class, 'forceDelete']);


//Profile Edit Conteroller_02 Route---------
Route::get('user/profile/edit',[UserProfileEditController::class,'user_profile_edit']);
Route::post('user/profile/update',[UserProfileEditController::class,'user_profile_update']);
Route::post('user/password/update',[UserProfileEditController::class,'user_password_update']);
Route::post('profile/photo/change',[UserProfileEditController::class,'profile_photo_change']);


require __DIR__.'/auth.php';
