<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;



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
Route::get('/',[AuthController::class,'login']);


//Route for Login User
Route::get('login',[AuthController::class,'login']);
Route::post('login', [AuthController::class, 'login_user']);


//Route for the Register User
Route::get('register',[AuthController::class,'register']);
Route::post('register',[AuthController::class,'create_user']);


//For Blog Post resource
Route::resource('blog-posts', BlogPostController::class)->middleware('auth');
//For Logout the admin user
Route::get('logout',[AuthController::class,'logout']);

//For User Dashboard
//For Admin Dashboard Panel 
Route::get('user/dashboard',[DashboardController::class,'user_dashboard']);
//For Listing of the Blog Post List
Route::get('user/blog_post/list',[BlogPostController::class,'blog_post_list']);
//For Createing of the Blog Post Form
Route::get('user/blog_post/create',[BlogPostController::class,'create_blog_post']);
//For Storing of the Blog Post Form
Route::post('user/blog_post/store', [BlogPostController::class, 'store']);
//For Deleting of the Blog Post Form
Route::delete('user/blog_post/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog_post.delete');
//For Editing of the Blog Post Form
Route::get('user/blog_post/edit/{id}', [BlogPostController::class, 'edit'])->name('blog_post.edit');
//For Updating of the Blog Post Form
Route::post('user/blog_post/update/{id}', [BlogPostController::class, 'update'])->name('blog_post.update');

//Applying the moiddleware for admin user authenticating purpose
Route::group(['middleware' => 'adminuser'],function(){
//For Admin Dashboard Panel 
Route::get('panel/dashboard',[DashboardController::class,'dashboard']);
//For Admin Dashboard  User List
Route::get('panel/user/list',[UserController::class,'user']);
//For Admin Dashboard  Add User 
Route::get('panel/user/add',[UserController::class,'add_user']);
//For Admin Dashboard  Insert User 
Route::post('panel/user/add',[UserController::class,'insert_user']);
//For Admin Dashboard  Edit User 
Route::get('panel/user/edit/{id}',[UserController::class,'edit_user']);
//For Admin Dashboard  Update User 
Route::post('panel/user/edit/{id}',[UserController::class,'update_user']);
Route::get('panel/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
Route::get('panel/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');


});








