<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\NotAuthenticated;
use App\Http\Middleware;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\StockController;

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
    return redirect()->intended("/dashboard");
});

Route::get("/auth/login", [LoginController::class, "index"])->name("login")->middleware(NotAuthenticated::class);
Route::post("/auth/login", [LoginController::class, "login"])->middleware(NotAuthenticated::class)->name('loginuser');

Route::get("/auth/register", [RegisterController::class, "index"])->middleware(NotAuthenticated::class)->name('register');
Route::post("/auth/register", [RegisterController::class, "store"])->middleware(NotAuthenticated::class)->name('registeruser');

Route::get("/auth/logout", function(Request $request) {
    $user = Auth::user();
    if ($user) {
        $user->setRememberToken(null);
    }
    Auth::logout();
    return redirect("/auth/login");
})->middleware(Middleware\EnsureAuthenticated::class);

Route::group(["prefix" => 'dashboard', "middleware" => Middleware\EnsureAuthenticated::class], function () {
    Route::get("/", [Dashboard\DashboardController::class, "index"]);
    Route::get("/balance", [Dashboard\BalanceController::class, "index"]);
    Route::post("/deposit", [Dashboard\DepositController::class, "store"]);
    Route::get("/bank", [Dashboard\BankController::class, "index"]);
    Route::post("/bank", [Dashboard\BankController::class, "store"]);
    Route::get("/stocks/{id}", [Dashboard\StocksController::class, "id"]);
    Route::post("/stocks/{id}", [Dashboard\StocksController::class, "createOrder"]);
    Route::delete("/stocks/{id}", [Dashboard\StocksController::class, "cancelBuyOpenOrders"]);
});

Route::get('/search', [StockController::class, 'search']);
