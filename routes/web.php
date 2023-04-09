<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\NotAuthenticated;
use App\Http\Middleware;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Admin;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SettingsController;

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

Route::delete("/auth/logout", function(Request $request) {
    $user = Auth::user();
    if ($user) {
        $user->setRememberToken(null);
    }
    Auth::logout();
    return redirect("/auth/login");
})->middleware(Middleware\EnsureAuthenticated::class);

Route::group(["prefix" => 'dashboard', "middleware" => Middleware\EnsureAuthenticated::class], function () {
    Route::get("/", [Dashboard\DashboardController::class, "index"]);
    Route::get("/notifications", [Dashboard\NotificationsController::class, "show"]);
    Route::get("/balance", [Dashboard\BalanceController::class, "show"]);
    Route::post("/balance/deposit", [Dashboard\BalanceController::class, "storeDeposit"]);
    Route::post("/balance/withdraw", [Dashboard\BalanceController::class, "storeWithdraw"]);
    Route::get("/bank", [Dashboard\BankController::class, "index"]);
    Route::post("/bank", [Dashboard\BankController::class, "store"]);
    Route::get('/settings', [SettingsController::class, 'index']);
    Route::post('/settings/password', [SettingsController::class, 'save_password']);
    Route::post('/settings/profile', [SettingsController::class, 'save_profile']);
    Route::post('/settings/banks', [SettingsController::class, 'save_bank']);
    Route::delete('/settings/banks', [SettingsController::class, 'delete_bank']);
    Route::get("/stocks/{id}", [Dashboard\StocksController::class, "id"]);
    Route::post("/stocks/{id}", [Dashboard\StocksController::class, "createOrder"]);
    Route::delete("/stocks/{id}", [Dashboard\StocksController::class, "cancelBuyOpenOrders"]);
});

Route::group(["prefix" => "api/v1"], function() {
    Route::get('/search', [StockController::class, 'search']);
});

Route::Group(["prefix" => "admin", "middleware" => [Middleware\EnsureAuthenticated::class, Middleware\AdminMiddleware::class]], function() {
    Route::group(["prefix" => "users"], function() {
        Route::get("/", [Admin\UsersController::class, "show"]);
        Route::get("/create", [Admin\UsersController::class, "create"]);
        Route::post("/create", [Admin\UsersController::class, "createStore"]);
        Route::get("/{id}", [Admin\UsersController::class, "edit"]);
        Route::put("/{id}", [Admin\UsersController::class, "update"]);
        Route::delete("/{id}", [Admin\UsersController::class, "delete"]);
    });
    Route::group(["prefix" => "stocks"], function() {
        Route::get("/", [Admin\StocksController::class, "show"]);
        Route::get("/create", [Admin\StocksController::class, "create"]);
        Route::post("/create", [Admin\StocksController::class, "createStore"]);
        Route::get("/{id}", [Admin\StocksController::class, "edit"]);
        Route::put("/{id}", [Admin\StocksController::class, "update"]);
        Route::delete("/{id}", [Admin\StocksController::class, "delete"]);
    });
    Route::group(["prefix" => "open-orders"], function() {
        Route::get("/", [Admin\OpenOrdersController::class, "show"]);
        Route::delete("/{id}", [Admin\OpenOrdersController::class, "delete"]);
    });
    Route::group(["prefix" => "bank-list"], function() {
        Route::get("/", [Admin\BankListController::class, "show"]);
        Route::get("/create", [Admin\BankListController::class, "create"]);
        Route::post("/create", [Admin\BankListController::class, "createStore"]);
        Route::get("/{id}", [Admin\BankListController::class, "edit"]);
        Route::put("/{id}", [Admin\BankListController::class, "update"]);
        Route::delete("/{id}", [Admin\BankListController::class, "delete"]);
    });
    Route::group(["prefix" => "notifications"], function() {
        Route::get("/", [Admin\NotificationsController::class, "show"]);
        Route::get("/create", [Admin\NotificationsController::class, "create"]);
        Route::post("/create", [Admin\NotificationsController::class, "createStore"]);
        Route::get("/{id}", [Admin\NotificationsController::class, "edit"]);
        Route::put("/{id}", [Admin\NotificationsController::class, "update"]);
        Route::delete("/{id}", [Admin\NotificationsController::class, "delete"]);
    });
    Route::group(["prefix" => "deposits"], function() {
        Route::get("/", [Admin\DepositsController::class, "show"]);
        Route::get("/{id}", [Admin\DepositsController::class, "edit"]);
        Route::put("/{id}", [Admin\DepositsController::class, "update"]);
        Route::delete("/{id}", [Admin\DepositsController::class, "delete"]);
    });
    Route::group(["prefix" => "withdraws"], function() {
        Route::get("/", [Admin\WithdrawsController::class, "show"]);
        Route::get("/{id}", [Admin\WithdrawsController::class, "edit"]);
        Route::put("/{id}", [Admin\WithdrawsController::class, "update"]);
        Route::delete("/{id}", [Admin\WithdrawsController::class, "delete"]);
    });
});
