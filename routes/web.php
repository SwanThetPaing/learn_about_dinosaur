<?php

 use Illuminate\Support\Facades\Route;
 use App\Models\User;
 use App\Models\Blog;
 use App\Models\Comment;
 use Resources\views\Mail\SubscriberMail;
 use App\Http\Controllers\BlogController;
 use App\Http\Controllers\AdminBlogController;
 use App\Http\Controllers\AdminUserController;
 use App\Http\Controllers\UserProfileController;
//  use App\Http\Controllers\ProfileEditController;
 use App\Http\Controllers\CommentController;
 use App\Http\Controllers\AuthController;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Log;

Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
Route::delete('/admin/blogs/{comment:id}/delete', [CommentController::class, 'destory']);

Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login', [AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);
// Route::patch('/blogs/{user:name}/update', [ProfileEditController::class, 'update']);

Route::get('/components/{user:id}/profile', [UserProfileController::class, 'show']);
// Route::get('/components/menu', [UserProfileController::class, 'index']);
Route::get('/user/profile/{user:id}/edit', [UserProfileController::class, 'edit']);
Route::patch('/user/edit_profile/{user:id}/update', [UserProfileController::class, 'update']);

Route::middleware('can:admin')->group(function ()
{
    Route::get('/admin/blogs', [AdminBlogController::class, 'index']);
    Route::get('/admin/blogs/user_control', [AdminUserController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);
    Route::delete('/admin/blogs/{blog:slug}/delete1', [AdminBlogController::class, 'destory']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);
    Route::delete('/admin/users/{user:id}/delete', [AdminUserController::class, 'destory']);
});
