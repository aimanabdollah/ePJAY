<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OrphanController;

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
    return view('auth.login');
});



Route::get('/staff', function () {
    return view('staff.list-orphan');
});

Route::get('/staff/orphan', function () {
    return view('staff.list-orphan');
});
Auth::routes();


Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');

//Route::get('admin/finance', [HomeController::class, 'adminFinance'])->name('admin.home')->middleware('is_admin');

// Route::get('admin/finance/list-income', [HomeController::class, 'adminListIncome'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/finance/add-income', [HomeController::class, 'adminAddIncome'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/finance/edit-income', [HomeController::class, 'adminEditIncome'])->name('admin.home')->middleware('is_admin');

Route::get('admin/income', [IncomeController::class, 'index'])->name('income.index')->middleware('is_admin');
Route::get('admin/income/add-income', [IncomeController::class, 'create'])->name('income.create')->middleware('is_admin');
Route::post('admin/income', [IncomeController::class, 'store'])->name('income.store')->middleware('is_admin');
Route::get('admin/income/{income}', [IncomeController::class, 'show'])->name('income.show')->middleware('is_admin');
Route::get('admin/income/{income}/edit', [IncomeController::class, 'edit'])->name('income.edit')->middleware('is_admin');
Route::patch('admin/income/{income}', [IncomeController::class,'update'])->name('income.update')->middleware('is_admin');
Route::delete('admin/income/{income}', [IncomeController::class,'destroy'])->name('income.destroy')->middleware('is_admin');

Route::get('admin/expense', [ExpenseController::class, 'index'])->name('expense.index')->middleware('is_admin');
Route::get('admin/expense/add-expense', [ExpenseController::class, 'create'])->name('expense.create')->middleware('is_admin');
Route::post('admin/expense', [ExpenseController::class, 'store'])->name('expense.store')->middleware('is_admin');
Route::get('admin/expense/{expense}', [ExpenseController::class, 'show'])->name('expense.show')->middleware('is_admin');
Route::get('admin/expense/{expense}/edit', [ExpenseController::class, 'edit'])->name('expense.edit')->middleware('is_admin');
Route::patch('admin/expense/{expense}', [ExpenseController::class,'update'])->name('expense.update')->middleware('is_admin');
Route::delete('admin/expense/{expense}', [ExpenseController::class,'destroy'])->name('expense.destroy')->middleware('is_admin');

Route::get('admin/orphan', [OrphanController::class, 'index'])->name('orphan.index')->middleware('is_admin');
Route::get('admin/orphan/add-orphan', [OrphanController::class, 'create'])->name('orphan.create')->middleware('is_admin');
Route::post('admin/orphan', [OrphanController::class, 'store'])->name('orphan.store')->middleware('is_admin');
Route::get('admin/orphan/{orphan}', [OrphanController::class, 'show'])->name('orphan.show')->middleware('is_admin');
Route::get('admin/orphan/{orphan}/edit', [OrphanController::class, 'edit'])->name('orphan.edit')->middleware('is_admin');
Route::patch('admin/orphan/{orphan}', [OrphanController::class,'update'])->name('orphan.update')->middleware('is_admin');
Route::delete('admin/orphan/{orphan}', [OrphanController::class,'destroy'])->name('orphan.destroy')->middleware('is_admin');

// Route::get('/mahasiswas', [MahasiswaController::class,'index'])
// ->name('mahasiswas.index');

// Route::get('/mahasiswas/create', [MahasiswaController::class,'create'])
// ->name('mahasiswas.create');

// Route::post('/mahasiswas', [MahasiswaController::class,'store'])
// ->name('mahasiswas.store');



// Route::get('admin/finance/list-expense', [HomeController::class, 'adminListExpense'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/finance/add-expense', [HomeController::class, 'adminAddExpense'])->name('admin.home')->middleware('is_admin');
// Route::get('admin/finance/edit-expense', [HomeController::class, 'adminEditExpense'])->name('admin.home')->middleware('is_admin');

Route::get('admin/application', [HomeController::class, 'adminApplication'])->name('admin.home')->middleware('is_admin');
Route::get('admin/application/view-application', [HomeController::class, 'adminViewApplication'])->name('admin.home')->middleware('is_admin');

//Route::get('admin/orphan', [HomeController::class, 'adminOrphan'])->name('admin.home')->middleware('is_admin');
//Route::get('admin/orphan/add-orphan', [HomeController::class, 'adminAddOrphan'])->name('admin.home')->middleware('is_admin');
Route::get('admin/orphan/edit-orphan', [HomeController::class, 'adminEditOrphan'])->name('admin.home')->middleware('is_admin');
Route::get('admin/orphan/view-orphan', [HomeController::class, 'adminViewOrphan'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
