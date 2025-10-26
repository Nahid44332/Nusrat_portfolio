<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BlogCrontroller;
use App\Http\Controllers\backend\EduExpController;
use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\ProtfolioController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\SiteSettingController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [frontendController::class, 'index']);
Route::get('/portfolio/details/{id}', [frontendController::class, 'portfolioDetails']);
Route::get('/service-details/{id}', [frontendController::class, 'serviceDetails']);
Route::get('/blog-details', [frontendController::class, 'blogDetails']);
Route::get('/privacy', [frontendController::class, 'privacy']);
Route::get('/starter-page', [frontendController::class, 'starterPage']);
Route::get('/terms', [frontendController::class, 'terms']);
Route::get('/404', [frontendController::class, 'error']);
Route::get('/contact', [frontendController::class, 'contact']);
Route::post('/contact/store', [frontendController::class, 'contactStore']);

///AdminAuth.........
Route::get('/admin/login', [AdminAuthController::class, 'loginForm']);
Route::get('/admin/logout', [AdminAuthController::class, 'logOut']);


Auth::routes();
Route::get('/admin/dashboard', [AdminController::class, 'adminDashbord']);

//About......
Route::get('/about', [AboutController::class, 'about']);
Route::post('/about/update', [AboutController::class, 'update']);

Route::post('/skill/store', [AboutController::class, 'storeSkill']);
Route::post('/skill/update/{id}', [AboutController::class, 'updateSkill']);
Route::get('/skill/delete/{id}', [AboutController::class, 'deleteSkill']);


//Protfolio....
Route::get('/admin/protfolio', [ProtfolioController::class, 'protfolio']);
Route::post('/protfolio/store', [ProtfolioController::class, 'store']);
Route::get('/protfolio/edit/{id}', [ProtfolioController::class, 'edit']);
Route::post('/protfolio/update/{id}', [ProtfolioController::class, 'update']);
Route::get('/protfolio/delete/{id}', [ProtfolioController::class, 'destroy']);

//Service......
Route::get('/admin/service', [ServiceController::class, 'service']);
Route::post('/service/store', [ServiceController::class, 'store']);
Route::post('/service/update/{id}', [ServiceController::class, 'update']);
Route::get('/service/delete/{id}', [ServiceController::class, 'delete']);


//Category.....
Route::get('/admin/category', [CategoryController::class, 'category']);
Route::post('/category/store', [CategoryController::class, 'storeCategory']);
Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory']);
Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory']);

Route::post('/tag/store', [CategoryController::class, 'storeTag']);
Route::post('/tag/update/{id}', [CategoryController::class, 'updateTag']);
Route::get('/tag/delete/{id}', [CategoryController::class, 'deleteTag']);

//Banner.......
Route::get('/admin/banner', [BannerController::class, 'banner']);
Route::post('/admin/banner/update', [BannerController::class, 'update']);

//Blog........
Route::get('/admin/blog', [BlogCrontroller::class, 'blog']);
Route::post('/blog/store', [BlogCrontroller::class, 'store']);
Route::post('/blog/update/{id}', [BlogCrontroller::class, 'update']);
Route::get('/blog/delete/{id}', [BlogCrontroller::class, 'delete']);

//Education & Experence.......
Route::get('/admin/education', [EduExpController::class, 'education']);
Route::post('/admin/education/store', [EduExpController::class, 'storeEducation']);
Route::post('/admin/education/update/{id}', [EduExpController::class, 'updateEducation']);
Route::get('/admin/education/delete/{id}', [EduExpController::class, 'deleteEducation']);

Route::post('/admin/experience/store', [EduExpController::class, 'storeExperience']);
Route::post('/admin/experience/update/{id}', [EduExpController::class, 'updateExperience']);
Route::get('/admin/experience/delete/{id}', [EduExpController::class, 'deleteExperience']);

//Message......
Route::get('/admin/messages', [MessageController::class, 'message']);
Route::post('admin/messages/read/{id}', [MessageController::class, 'markRead']);
Route::post('admin/messages/unread/{id}', [MessageController::class, 'markUnread']);
Route::get('admin/messages/delete/{id}', [MessageController::class, 'delete']);
Route::post('admin/messages/reply/{id}', [MessageController::class, 'reply']);


//Testimonial.....
Route::get('/admin/testimonials', [TestimonialController::class, 'testimonial']);
Route::post('/admin/testimonials/store', [TestimonialController::class, 'store']);
Route::post('/admin/testimonials/update/{id}', [TestimonialController::class, 'update']);
Route::get('/admin/testimonials/delete/{id}', [TestimonialController::class, 'delete']);

//User.......
Route::get('admin/users', [UserController::class, 'index']);
Route::post('admin/users/store', [UserController::class, 'store']);
Route::post('admin/users/update/{id}', [UserController::class, 'update']);
Route::post('admin/users/change-password/{id}', [UserController::class, 'changePassword']);
Route::get('admin/users/delete/{id}', [UserController::class, 'delete']);

//SiteSetting........
Route::get('admin/setting', [SiteSettingController::class, 'setting']);
Route::post('admin/update', [SiteSettingController::class, 'update']);
