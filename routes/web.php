<?php

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

Route::get('/', 'welcomeController@index');
Route::get('/contact', 'welcomeController@contactUs');
Route::post('/contact', 'welcomeController@postContact');

Route::get('/blog-details/{id}', 'welcomeController@blogDetails');
Route::get('/category-blog/{id}', 'welcomeController@categoryBlog');

Route::get('/gallery', 'welcomeController@galleryPage');
Route::get('/about-us', 'welcomeController@aboutUs');



Route::get('/xyz', 'adminController@index');
Route::post('/admin_login', 'adminController@adminLogin');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@logout');



Route::get('/add-category', 'CategoryController@addCategory');
Route::post('/save-category', 'CategoryController@saveCategory');
Route::get('/manage-category', 'CategoryController@manageCategory');
Route::get('/unpublished-category/{id}', 'CategoryController@unpublishedCategory');
Route::get('/published-category/{id}', 'CategoryController@publishedCategory');
Route::get('/delete-category/{id}', 'CategoryController@deleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@editCategory');
Route::post('/update-category', 'CategoryController@updateCategory');


Route::get('/add-blog', 'PostController@addBlog');
Route::post('/save-blog', 'PostController@saveBlog');
Route::get('/manage-blog', 'PostController@manageBlog');
Route::get('/unpublished-blog/{id}', 'PostController@unpublishedBlog');
Route::get('/published-blog/{id}', 'PostController@publishedBlog');
Route::get('/delete-blog/{id}', 'PostController@deleteBlog');
Route::get('/edit-blog/{id}', 'PostController@editBlog');
Route::post('/update-blog', 'PostController@updateBlog');

Route::get('/social', 'socialController@addSocialMedia');
Route::post('/save-social', 'socialController@saveSocialContact');



Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
// Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

