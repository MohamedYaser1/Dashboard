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
Route::middleware('auth')->controller(CategoriesController::class)->group(function(){
    Route::get('/categories','index')->name('categories.index');
    Route::get('/categories/create','create')->name('categories.create');
    Route::Post('/categories','store')->name('categories.store');
    Route::get('/categories/{category}/edit','edit')->name('categories.edit');
    Route::Post('/categories/{category}','update')->name('categories.update');
    Route::get('/categories/{category}','destroy')->name('categories.destroy');
});


// Countirs Routes
Route::middleware('auth')->controller(CountriesController::class)->group(function(){
    Route::get('/countries','index')->name('countries.index');
    Route::get('/countries/create','create')->name('countries.create');
    Route::Post('/countries','store')->name('countries.store');
    Route::get('/countries/{country}/edit','edit')->name('countries.edit');
    Route::Post('/countries/{country}','update')->name('countries.update');
    Route::delete('/countries/{country}','destroy')->name('countries.destroy');
});


// Cities Routes
Route::middleware('auth')->controller(CitiesController::class)->group(function(){
    Route::get('/cities', 'index')->name('cities.index');
    Route::get('/cities/create', 'create')->name('cities.create');
    Route::Post('/cities', 'store')->name('cities.store');
    Route::get('/cities/{city}/edit', 'edit')->name('cities.edit');
    Route::Post('/cities/{city}', 'update')->name('cities.update');
    Route::delete('/city/{city}', 'destroy')->name('city.destroy');
});


// Users Routes
Route::middleware('auth')->controller(UsersController::class)->group(function(){
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::Post('/users', 'store')->name('users.store');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::Post('/users/{user}', 'update')->name('users.update');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy');
});


// Posts Routes
Route::middleware('auth')->controller(PostsController::class)->group(function(){
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::Post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::Post('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
});


// Admins Routes
Route::middleware('auth')->controller(AdminsController::class)->group(function(){
    Route::get('/admins', 'index')->name('admins.index');
    Route::get('/admins/create', 'create')->name('admins.create');
    Route::Post('/admins', 'store')->name('admins.store');
    Route::get('/admins/{admin}/edit', 'edit')->name('admins.edit');
    Route::Post('/admins/{admin}', 'update')->name('admins.update');
    Route::delete('/admins/{admin}', 'destroy')->name('admins.destroy');
});