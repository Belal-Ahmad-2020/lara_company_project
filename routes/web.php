<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\RestoreController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ImageController;



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

// Category 
Route::resource('/category', CategoryController::class);
// restore category
Route::get('/categoryRestore/{id}', [HelperController::class, "categoryRestore"]);
//force delete category
Route::get('/categoryForceDelete/{id}', [HelperController::class, "categoryForceDelete"]);


// Brand
Route::resource('/brand', BrandController::class);

// brand restore
Route::get('/brandRestore/{id}', [HelperController::class, "brandRestore"]);
// force delete brand
Route::get('/brandForceDelete/{id}', [HelperController::class, "brandForceDelete"]);

Route::resource('/image', ImageController::class);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // show users using ORM
    $users = User::all();

    // display users using query builder
    // $users = DB::table('users')->get();
    return view('admin.dashboard', compact('users'));
})->name('dashboard');



//  backend
Route::view('back', 'layouts.backend.app');