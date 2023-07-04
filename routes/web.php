<?php

use App\Http\Controllers\addCourseStudentController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\AjaxCategoryController;
use App\Http\Controllers\AjaxCourseController;
use App\Http\Controllers\AjaxModuleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GetIdCourseByAjaxController;
use App\Http\Controllers\GetModuleByAjaxController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SocialiteLoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\getUserByAjax;
use App\Http\Controllers\NotificationController;

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


Auth::routes();

Route::resource('/course', CourseController::class);

Route::resource('/module', ModuleController::class);

Route::resource('/lesson', LessonController::class);

Route::resource('/teacher', TeacherController::class);
Route::resource('/article', ArticleController::class);

Route::resource('/category', CategoryController::class);

Route::resource('/notification', NotificationController::class);

Route::post('/ajaxCategory', [AjaxCategoryController::class, 'store'])->name('ajaxCategory');

Route::post('/ajaxCourse', [AjaxCourseController::class, 'store'])->name('ajaxCourse');

Route::post('/ajaxModule', [AjaxModuleController::class, 'store'])->name('ajaxModule');



Route::resource('/student/add-course', AddCourseStudentController::class);

Route::post('/getIdCourse', [GetIdCourseByAjaxController::class, 'index']);

Route::post('/GetModuleByAjax', [GetModuleByAjaxController::class, 'index']);


Route::resource('/tag', TagController::class);

Route::resource('/comment', CommentController::class);

Route::resource('category-blog', CategoryBlogController::class);
Route::post('/district/{district}', [DistrictController::class, 'index']);
Route::post('/province/{province}', [ProvinceController::class, 'index']);
Route::resource('/student', StudentController::class);

Route::resource('/slider', SliderController::class);

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

