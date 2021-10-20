<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\RestoreController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontEndPagesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;
use App\Models\Brand;
use App\Models\About;
use App\Models\Image;
use App\Models\Service;

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
    $brands = Brand::all();
    $about = About::first();
    $services = Service::all();
    $images = Image::latest()->simplePaginate(6);
    return view('index', compact('brands', 'about', 'services', 'images'));
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

// Multi Image Upload
Route::resource('/image', ImageController::class);

// Slider 
Route::resource('/slider', SliderController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // show users using ORM
    $users = User::all();

    // display users using query builder
    // $users = DB::table('users')->get();
    return view('admin.dashboard', compact('users'));
})->name('dashboard');



//  backend
Route::view('back', 'layouts.backend.app');

// contact information 
Route::resource('contact', ContactController::class);

/////////////////////// frontend 
Route::view('front', 'layouts.frontend.app');

// about us page
Route::resource('/about', AboutController::class);

// services page
Route::resource('/service', ServiceController::class);

// portfolio page
Route::get('/portfolio', [FrontEndPagesController::class, 'portfolio'])->name('portfolio');

// contact Infromation 
Route::get('/contactInfo', [FrontEndPagesController::class, 'contactInfo'])->name('contact');

// contact message
Route::get('/contactMessage', [ContactMessageController::class, 'index'])->name('contactMessage');

// contact message create
Route::get('/contactMessage', [ContactMessageController::class, 'create'])->name('create');


// contact Message Delete
Route::post('/contactMessage/delete/{id}', [ContactMessageController::class, 'delete'])->name('delete');
