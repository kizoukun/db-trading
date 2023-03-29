<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\NotAuthenticated;
use App\Http\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/auth/login", [LoginController::class, "index"])->name("login")->middleware(NotAuthenticated::class);
Route::post("/auth/login", [LoginController::class, "login"])->middleware(NotAuthenticated::class);

Route::get("/auth/register", [RegisterController::class, "index"])->middleware(NotAuthenticated::class);
Route::post("/auth/register", [RegisterController::class, "store"])->middleware(NotAuthenticated::class);

Route::get("/auth/logout", function() {
    Auth::logout();
    return redirect("/auth/login");
})->middleware(Middleware\EnsureAuthenticated::class);
