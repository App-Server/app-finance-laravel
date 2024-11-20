<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdjustmentsCorrectionsController;
use App\Http\Controllers\AdjustmentsCorrectionsExpenseController;
use App\Http\Controllers\AdjustmentsCorrectionsRevenueController;
use App\Http\Controllers\CreateExpenseAccountController;
use App\Http\Controllers\CreateRevenueAccountController;
use App\Http\Controllers\ExpenseComment;
use App\Http\Controllers\ExtratoController;
use App\Http\Controllers\RevenueComment;

Route::get('/', function () {
    return view('login.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::middleware([ 'middleware' => 'auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard', [DashboardController::class, 'search'])->name('dashboard.search');

    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue.index');

    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.index');

    Route::get('/accounts', [AccountsController::class, 'index'])->name('expense.index');

    Route::put('/create-expense-account/{id}', [CreateExpenseAccountController::class, 'update'])->name('create-expense-account.update');
    Route::get('/create-expense-account/{id}/edit', [CreateExpenseAccountController::class, 'edit'])->name('create-expense-account.edit');
    Route::get('/create-expense-account', [CreateExpenseAccountController::class, 'index'])->name('create-expense-account.index');
    Route::post('/create-expense-account', [CreateExpenseAccountController::class, 'store'])->name('create-expense-account.store');

    Route::put('/create-revenue-account/{id}', [CreateRevenueAccountController::class, 'update'])->name('create-revenue-account.update');
    Route::get('/create-revenue-account/{id}/edit', [CreateRevenueAccountController::class, 'edit'])->name('create-revenue-account.edit');
    Route::get('/create-revenue-account', [CreateRevenueAccountController::class, 'index'])->name('create-revenue-account.index');
    Route::post('/create-revenue-account', [CreateRevenueAccountController::class, 'store'])->name('create-revenue-account.store');
    
    Route::get('/revenue/{id}/revenue-comment', [RevenueComment::class, 'index'])->name('revenue-comment.index');
    Route::post('/revenue/{id}/revenue-comment', [RevenueComment::class, 'store'])->name('revenue-comment.store');

    Route::get('/expense/{id}/expense-comment', [ExpenseComment::class, 'index'])->name('expense-comment.index');
    Route::post('/expense/{id}/expense-comment', [ExpenseComment::class, 'store'])->name('expense-comment.store');

    Route::get('extrato', [ExtratoController::class, 'index'])->name('extrato.index');
    Route::post('extrato', [ExtratoController::class, 'search'])->name('extrato.search');

    Route::get('/adjustments-corrections', [AdjustmentsCorrectionsController::class, 'index'])->name('adjustments-corrections.index');

    Route::get('adjustments-corrections-expense', [AdjustmentsCorrectionsExpenseController::class, 'index'])->name('adjustments-corrections-expense.index');

    Route::get('adjustments-corrections-revenue', [AdjustmentsCorrectionsRevenueController::class, 'index'])->name('adjustments-corrections-revenue.index');

});
