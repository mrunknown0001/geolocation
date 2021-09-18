<?php

use Illuminate\Support\Facades\Route;


Route::get('/test', 'TestController@test');

Route::get('/', function () {
    return view('login');
});


Route::get('/email', 'MailController@sendMail');

# Login for User
Route::get('/login', 'LoginController@login')->name('login');
# Post Login for User
Route::post('/login', 'LoginController@postLogin')->name('post.login');

# Login for Admin
Route::get('/admin/login', 'LoginController@adminLogin')->name('admin.login');
#post Login for Admin
Route::post('/admin/login', 'LoginController@postAdminLogin')->name('post.admin.login');

# Login for Super Admin

Route::get('/logout', 'LoginController@logout')->name('logout');

# Admin Route Group
Route::group(['prefix' => 'a', 'middleware' => 'admin'], function () {
	# Admin Dashboard
	Route::get('/dashboard/', 'AdminController@dashboard')->name('admin.dashboard');
	# Admin Profile
	Route::get('/profile', 'AdminController@profile')->name('admin.profile');
	# All Users
	Route::get('/users', 'AdminController@users')->name('admin.users');
});


# User Route Group
Route::group(['prefix' => 'm', 'middleware' => 'manager'], function () {
	# User Dashboard
	Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
});

# User Route Group
Route::group(['prefix' => 'e', 'middleware' => 'employee'], function () {
	# User Dashboard
	Route::get('/dashboard', 'EmployeeController@dashboard')->name('emp.dashboard');
});
