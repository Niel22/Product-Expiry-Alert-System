<?php

use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Signin;
use App\Livewire\Auth\Signup;
use App\Livewire\Category\Add as CategoryAdd;
use App\Livewire\Category\Index as CategoryIndex;
use App\Livewire\Home;
use App\Livewire\Product\Add;
use App\Livewire\Product\Alert;
use App\Livewire\Product\Details;
use App\Livewire\Product\Edit;
use App\Livewire\Product\Index;
use App\Livewire\User\Add as UserAdd;
use App\Livewire\User\Details as UserDetails;
use App\Livewire\User\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)->name('home');

    // Product
    Route::get('/products', Index::class)->name('products.list');
    Route::get('/products/add', Add::class)->name('products.add');
    Route::get('/products/{batch_no}', Details::class)->name('products.detail');
    Route::get('/products/{batch_no}/edit', Edit::class)->name('products.edit');
    Route::get('/expiry-alert', Alert::class)->name('products.expiry');

    // Category
    Route::get('/categories', CategoryIndex::class)->name('categories.list');
    Route::get('/categories/add', CategoryAdd::class)->name('categories.add');

    // User
    Route::get('/users', UserIndex::class)->name('users.list')->middleware('admin');
    Route::get('/user/add', UserAdd::class)->name('users.add')->middleware('admin');
    Route::get('profile', UserDetails::class)->name('user.profile');
});

// Auth
Route::get('/auth/signin', Signin::class)->name('login')->middleware('guest');
