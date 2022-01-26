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

Route::prefix("/admin")->middleware("is_admin")->group(function (){
    Route::get("/dashboard",[AdminController::class,"index"]);
    Route::prefix("/articles")->group(function (){
        Route::get("/",[ArticleController::class,"index"]);
        Route::get("/create",[ArticleController::class,"create"]);
        Route::post("/",[ArticleController::class,"store"]);
        Route::get("/{articles}/edit",[ArticleController::class,"edit"]);
        Route::put("/{articles}",[ArticleController::class,"update"]);
        Route::post("/{articles}/switch-status",[ArticleController::class,"switch_status"]); // Change article's is_draft column.
        Route::post("/{articles}/switch-visibility",[ArticleController::class,"switch_visibility"]); // Change article's is_active column.
        Route::delete("/{articles}",[ArticleController::class,"delete"]);
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


