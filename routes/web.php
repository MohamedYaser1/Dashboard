<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

// this Unauthorized Page to inform users that he is Unauthorized
Route::get('/unauthorizedPage', function(){
    return view('unauthorizedPage');
})->name('unauthorizedPage');


/*  Route::get('/', function () {
    return view('welcome');
})->name('index'); */


Route::Post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


// Login & SignUp Routes
Route::middleware('guest')->controller(AuthenticationController::class)->group(function(){
    Route::get('/signup', 'showSignup')->name('signup.show');
    Route::get('/login', 'showLogin')->name('login.show');
    Route::Post('/signup', 'signup')->name('signup');
    Route::Post('/login', 'login')->name('login');
});




// Categories Routes
Route::middleware(['middleware' => 'admin'])->controller(CategoriesController::class)->group(function(){
    Route::get('/categories','index')->name('categories.index');
    Route::get('/categories/create','create')->name('categories.create');
    Route::Post('/categories','store')->name('categories.store');
    Route::get('/categories/{category}','show')->name('categories.show');
    Route::get('/categories/{category}/edit','edit')->name('categories.edit');
    Route::Post('/categories/{category}','update')->name('categories.update');
    Route::delete('/categories','destroy')->name('categories.destroy');
});


// Countirs Routes
Route::middleware(['middleware' => 'admin'])->controller(CountriesController::class)->group(function(){
    Route::get('/countries','index')->name('countries.index');
    Route::get('/countries/create','create')->name('countries.create');
    Route::Post('/countries','store')->name('countries.store');
    Route::get('/countries/{country}/edit','edit')->name('countries.edit');
    Route::Post('/countries/{country}','update')->name('countries.update');
    Route::delete('/countries','destroy')->name('countries.destroy');
});



// Cities Routes
Route::middleware(['middleware' => 'admin'])->controller(CitiesController::class)->group(function(){
    Route::get('/cities', 'index')->name('cities.index');
    Route::get('/cities/create', 'create')->name('cities.create');
    Route::Post('/cities', 'store')->name('cities.store');
    Route::get('/cities/{city}/edit', 'edit')->name('cities.edit');
    Route::Post('/cities/{city}', 'update')->name('cities.update');
    Route::delete('/city', 'destroy')->name('cities.destroy');
});


// Users Routes
Route::middleware(['middleware' => 'admin'])->controller(UsersController::class)->group(function(){
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::Post('/users', 'store')->name('users.store');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::Post('/users/{user}', 'update')->name('users.update');
    Route::delete('/users', 'destroy')->name('users.destroy');
});


// Posts Routes
Route::middleware('auth')->controller(PostsController::class)->group(function(){
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::Post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::Post('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts', 'destroy')->name('posts.destroy');

    Route::post('get-cities-by-country',  'getCity');

});


// Admins Routes
Route::middleware(['middleware' => 'admin'])->controller(AdminsController::class)->group(function(){
    Route::get('/admins', 'index')->name('admins.index');
    Route::get('/admins/create', 'create')->name('admins.create');
    Route::Post('/admins', 'store')->name('admins.store');
    Route::get('/admins/{admin}/edit', 'edit')->name('admins.edit');
    Route::Post('/admins/{admin}', 'update')->name('admins.update');
    Route::delete('/admins', 'destroy')->name('admins.destroy');
});