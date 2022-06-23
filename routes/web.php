<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OrphanController;
use App\Http\Controllers\ApplicationController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('landing');
});



Route::get('/staff', function () {
    return view('staff.list-orphan');
});

Route::get('/staff/orphan', function () {
    return view('staff.list-orphan');
});
Auth::routes();

// Route::get('/test', [HomeController::class, 'landing'])->name('landing.view');
Route::get('admin-home', [HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');

Route::get('admin-user', [HomeController::class, 'userList'])->name('user.index')->middleware('is_admin');
Route::get('admin-user/add-user', [HomeController::class, 'userCreate'])->name('user.create')->middleware('is_admin');
Route::post('admin-user', [HomeController::class, 'userStore'])->name('user.store')->middleware('is_admin');
Route::get('admin-user/{user}', [HomeController::class, 'userShow'])->name('user.show')->middleware('is_admin');
Route::get('admin-user/{user}/edit', [HomeController::class, 'userEdit'])->name('user.edit')->middleware('is_admin');
Route::patch('admin-user/{user}', [HomeController::class,'userUpdate'])->name('user.update')->middleware('is_admin');
Route::delete('admin-user/{user}', [HomeController::class,'userDestroy'])->name('user.destroy')->middleware('is_admin');

Route::get('admin-income', [IncomeController::class, 'index'])->name('income.index')->middleware('is_admin');
Route::get('admin-income/add-income', [IncomeController::class, 'create'])->name('income.create')->middleware('is_admin');
Route::post('admin-income', [IncomeController::class, 'store'])->name('income.store')->middleware('is_admin');
Route::get('admin-income/{income}', [IncomeController::class, 'show'])->name('income.show')->middleware('is_admin');
Route::get('admin-income/{income}/edit', [IncomeController::class, 'edit'])->name('income.edit')->middleware('is_admin');
Route::patch('admin-income/{income}', [IncomeController::class,'update'])->name('income.update')->middleware('is_admin');
Route::delete('admin-income/{income}', [IncomeController::class,'destroy'])->name('income.destroy')->middleware('is_admin');

Route::get('admin-expense', [ExpenseController::class, 'index'])->name('expense.index')->middleware('is_admin');
Route::get('admin-expense/add-expense', [ExpenseController::class, 'create'])->name('expense.create')->middleware('is_admin');
Route::post('admin-expense', [ExpenseController::class, 'store'])->name('expense.store')->middleware('is_admin');
Route::get('admin-expense/{expense}', [ExpenseController::class, 'show'])->name('expense.show')->middleware('is_admin');
Route::get('admin-expense/{expense}/edit', [ExpenseController::class, 'edit'])->name('expense.edit')->middleware('is_admin');
Route::patch('admin-expense/{expense}', [ExpenseController::class,'update'])->name('expense.update')->middleware('is_admin');
Route::delete('admin-expense/{expense}', [ExpenseController::class,'destroy'])->name('expense.destroy')->middleware('is_admin');

Route::get('admin-orphan', [OrphanController::class, 'index'])->name('orphan.index')->middleware('is_admin');
Route::get('admin-orphan/add-orphan', [OrphanController::class, 'create'])->name('orphan.create')->middleware('is_admin');
Route::post('admin-orphan', [OrphanController::class, 'store'])->name('orphan.store')->middleware('is_admin');
Route::get('admin-orphan/{orphan}', [OrphanController::class, 'show'])->name('orphan.show')->middleware('is_admin');
Route::get('admin-orphan/{orphan}/edit', [OrphanController::class, 'edit'])->name('orphan.edit')->middleware('is_admin');
Route::patch('admin-orphan/{orphan}', [OrphanController::class,'update'])->name('orphan.update')->middleware('is_admin');
Route::delete('admin-orphan/{orphan}', [OrphanController::class,'destroy'])->name('orphan.destroy')->middleware('is_admin');

Route::get('admin-application', [ApplicationController::class, 'viewApplication'])->name('application.index')->middleware('is_admin');
//Route::get('admin/application/{application}', [ApplicationController::class, 'show'])->name('application.show')->middleware('is_admin');

Route::get('admin-application/{application}/edit', [ApplicationController::class, 'edit'])->name('application.edit')->middleware('is_admin');
Route::patch('admin-application/{application}', [ApplicationController::class,'update'])->name('application.update')->middleware('is_admin');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('application', [ApplicationController::class, 'index'])->name('application.index');
Route::get('add-application', [ApplicationController::class, 'create'])->name('application.create');
Route::post('application', [ApplicationController::class, 'store'])->name('application.store');
Route::get('application/{application}', [ApplicationController::class, 'applicationShow'])->name('application.show');

Route::get('application/tawaran/{application}', [ApplicationController::class, 'viewTawaran'])->name('application.tawaran');
//Route::get('tawaran', [ApplicationController::class, 'viewTawaran'])->name('application.tawaran');
Route::get('tawaran-print', [ApplicationController::class, 'printTawaran'])->name('application.printtawaran');

Route::get('application/keputusan/{application}', [ApplicationController::class, 'viewKeputusan'])->name('application.keputusan');


Route::get('list-orphan', [ApplicationController::class, 'orphanList'])->name('application.orphanList');
Route::get('list-orphan/{orphan}', [ApplicationController::class, 'orphanShow'])->name('application.orphanShow');




