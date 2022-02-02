<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("guest")->group(function (){
    Route::get("/register",[UserController::class,"register"]);
    Route::post("/register",[UserController::class,"registerPost"]);
    Route::get("/login",[UserController::class,"login"]);
    Route::post("/login",[UserController::class,"loginWithEmail"]);
    Route::get("/login/google",[UserController::class,"loginWithGoogle"]);
    Route::get("/login/google/callback",[UserController::class,"loginWithGoogleCallback"]);
});

Route::redirect("/admin","/admin/dashboard");

Route::prefix("/admin")->middleware("is_admin")->group(function (){



    Route::get("/dashboard",[AdminController::class,"index"]);
    Route::prefix("/articles")->group(function (){
        Route::get("/",[ArticleController::class,"index"]);
        Route::get("/create",[ArticleController::class,"create"]);
        Route::post("/publish",[ArticleController::class,"publish"]);
        Route::get("/{article}/edit",[ArticleController::class,"edit"]);
        Route::put("/{article}",[ArticleController::class,"update"]);
        Route::post("/draft",[ArticleController::class,"store_draft"]); // Store draft articles.
        Route::put("/{article}/draft",[ArticleController::class,"update_draft"]); // Store draft articles.
        Route::post("/{article}/switch-visibility",[ArticleController::class,"switch_visibility"]); // Change article's is_active column.
        Route::delete("/{article}",[ArticleController::class,"delete"]);

    });

    Route::prefix("/categories")->group(function (){
        Route::get("/",[CategoryController::class,"index"]);
        Route::get("/create",[CategoryController::class,"create"]);
        Route::post("/",[CategoryController::class,"store"]);
        Route::get("/{categories}/edit",[CategoryController::class,"edit"]);
        Route::put("/{categories}",[CategoryController::class,"update"]);
        Route::delete("/{categories}",[CategoryController::class,"delete"]);
    });
});

Route::middleware("auth")->group(function (){
    Route::get("/logout",[UserController::class,"logout"]);
});


