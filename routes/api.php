<?php

use App\Http\Controllers\Api\ApiCourseController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChangePaswordController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\MyCourseController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SocialiteLoginController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\UrlVideoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('comment/store', [CommentController::class, 'store'])->middleware('auth:sanctum');
// Route::resource('/course',CourseController  ::class);
// Route::resource('/category',CategoryController::class);
Route::prefix('course')->group(function () {
    Route::get('featured', [CourseController::class, 'featured']);
    Route::get('discount', [CourseController::class, 'discount']);
    Route::get('unpublish', [CourseController::class, 'unpublish']);
    Route::get('categories-courses', [CourseController::class, 'categories']);
    Route::get('categories/{id}', [CourseController::class, 'categoryDetail'])->name('api-category-courses-detail');
    Route::get('/detail/{id}', [CourseController::class, 'courseDetail'])->name('api-couser-detail');
});

Route::post('/upload', [UploadController::class, 'upload']);


Route::prefix('article')->group(function () {
    Route::get('featured', [ArticleController::class, 'featured']);
    Route::get('latest', [ArticleController::class, 'latest']);
    Route::get('categories', [ArticleController::class, 'categoryBlogs']);
    Route::get('category/{id}', [ArticleController::class, 'categoryBlogDetail']);
    Route::get('detail/{id}', [ArticleController::class, 'articleDetail']);
    Route::get('tag/{id}', [ArticleController::class, 'articleTagDetail']);
});

Route::get('/lesson/{id}', [LessonController::class, 'lessonDetail']);

Route::prefix('teacher')->group(function () {
    Route::get('featured', [TeacherController::class, 'featured']);
    Route::get('detail/{id}', [TeacherController::class, 'teacherDetail'])->name('api-teacher-detail');
});

Route::get('my-course', [MyCourseController::class, 'myCourse'])->middleware('auth:sanctum');

Route::get('/search', [SearchController::class, 'search']);

Route::post('comment/store', [CommentController::class, 'store'])->middleware('auth:sanctum');

Route::resource('/slider', SliderController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login/facebook', [SocialiteLoginController::class, 'goToFacebook']);
Route::get('/login/facebook/callback', [SocialiteLoginController::class, 'callbackFacebook']);
Route::get('/login/get-social-redirect-url', [SocialiteLoginController::class, 'getRedirectUri']);
Route::get('/login/login-by-authorized-code', [SocialiteLoginController::class, 'loginUsingToken']);

Route::get('/register/get-social-redirect-url', [SocialiteLoginController::class, 'getRedirectUri']);
Route::get('/register/register-by-authorized-code', [SocialiteLoginController::class, 'registerUsingToken']);

//reset password
Route::post('reset-password',[ResetPasswordController::class, 'sendMail']);
Route::PUT('reset-password/{token}', [ResetPasswordController::class, 'reset']);

//Url video
Route::get('url-video/{id}',[UrlVideoController::class, 'urlVideo']);

//refresh token
Route::post('refresh-token', [AuthController::class, 'refresh'])->middleware('auth:sanctum')->name('token.refresh');

//Change password
Route::post('change-password', [ChangePaswordController::class,'changePassword'])->middleware('auth:sanctum');


Route::match(['get', 'post', 'put', 'patch', 'delete'], '{any}', function () {
    return response()->json(['error' => 'url not exist'],404);
})->where('any', '.*');
