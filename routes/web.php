<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSalesInkabaController;
use App\Http\Controllers\DashboardSalesSpBdgController;
use App\Http\Controllers\DashboardSalesSpCrbController;
use App\Http\Controllers\DashboardDetailInkabaController;
use App\Http\Controllers\DashboardDetailEmployeeController;
use App\Http\Controllers\DashboardDetailSpBandungController;

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
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Deni Ruhyadi",
        "email" => "dryd78@gmail.com",
        "image" => "dryd.jpg"
    ]);
});


Route::get('/posts', [PostController::class, 'index']);

// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard/register', [RegisterController::class, 'index'])->middleware('auth');
Route::post('/dashboard/register', [RegisterController::class, 'store']);
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');


// Human Resources Route
Route::resource('/dashboard/employees', EmployeesController::class)->middleware('auth');

// Finance Route
Route::resource('/dashboard/finance', FinanceController::class)->middleware('auth');

// Post Route
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');


// Sales Group Route
Route::resource('/dashboard/sales/inkaba', DashboardSalesInkabaController::class)->middleware('auth');
Route::resource('/dashboard/sales/SpBdg', DashboardSalesSpBdgController::class)->middleware('auth');
Route::post('/dashboard/sales/SpBdg/{product_name}',[DashboardSalesSpBdgController::class, 'getUom'])->middleware('auth'); 
Route::resource('/dashboard/sales/SpCrb', DashboardSalesSpCrbController::class)->middleware('auth');
Route::post('/dashboard/sales/SpCrb/{product_name}',[DashboardSalesSpCrbController::class, 'getUom'])->middleware('auth'); 

// Product Route
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');

// Dashboard detail route
Route::resource('/dashboard/details/inkaba', DashboardDetailInkabaController::class)->middleware('auth');
Route::resource('/dashboard/details/SpBdg', DashboardDetailSpBandungController::class)->middleware('auth');
Route::resource('/dashboard/details/employees', DashboardDetailEmployeeController::class)->middleware('auth');

// Administrator Route
Route::resource('/dashboard/register', AdminRegisterController::class)->except('show')->middleware('admin');

