<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\OrphanController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecordDeleteController;


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

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('profile/{user}/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::patch('profile/{user}', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::get('profile/password/{user}/edit', [UserController::class, 'editPassword'])->name('password.edit');
    Route::patch('profile/password/{user}', [UserController::class, 'updatePassword'])->name('password.update');

    Route::get('application/{application}', [ApplicationController::class, 'applicationShow'])->name('application.show');

    Route::get('admin-orphan/{orphan:id_anak_jagaan}', [OrphanController::class, 'show'])->name('orphan.show');
    Route::get('report-orphan/{orphan:id_anak_jagaan}', [OrphanController::class, 'report'])->name('orphan.report');


    // Routes for 'admin' middleware
    Route::middleware('is_admin')->group(function () {

        // Home routes
        Route::get('/admin-home', [HomeController::class, 'adminHome'])->name('admin.home');

        // User routes
        Route::get('admin-user', [UserController::class, 'index'])->name('user.index');
        Route::get('admin-user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('admin-user/{user}', [UserController::class, 'update'])->name('user.update');

        // Configuration routes
        Route::get('admin-configuration', [ConfigurationController::class, 'index'])->name('configuration.index');
        Route::get('admin-configuration-sys/{configuration}/edit', [ConfigurationController::class, 'editSys'])->name('configuration.editSys');
        Route::patch('admin-configuration-sys/{configuration}', [ConfigurationController::class, 'updateSys'])->name('configuration.updateSys');
        Route::get('admin-configuration-org/{configuration}/edit', [ConfigurationController::class, 'editOrg'])->name('configuration.editOrg');
        Route::patch('admin-configuration-org/{configuration}', [ConfigurationController::class, 'updateOrg'])->name('configuration.updateOrg');


        // Record Delete routes
        Route::get('record-delete/category', [RecordDeleteController::class, 'indexCategory'])->name('record-delete.indexCategory');
        Route::delete('record-delete/category/{category}', [RecordDeleteController::class, 'deleteCategory'])->name('record-delete.deleteCategory');
    });

    // Routes for 'staf' middleware
    Route::middleware('is_staf')->group(function () {

        // Home routes
        Route::get('/staf-home', [HomeController::class, 'stafHome'])->name('staf.home');
    });

    // Routes for 'user' middleware
    Route::middleware('is_user')->group(function () {

        // Home routes
        Route::get('/user-home', [HomeController::class, 'userHome'])->name('user.home');

        // Application routes
        Route::get('application', [ApplicationController::class, 'index'])->name('application.index');
        Route::get('add-application', [ApplicationController::class, 'create'])->name('application.create');
        Route::post('application', [ApplicationController::class, 'store'])->name('application.store');

        Route::get('application/result/{application}', [ApplicationController::class, 'viewKeputusan'])->name('application.result');

        // Orphan routes
        Route::get('list-orphan', [OrphanController::class, 'orphanList'])->name('orphan.orphanList');
    });

    // Routes for 'admin and staf' middleware
    Route::middleware('is_adminstaf')->group(function () {

        // Category routes
        Route::get('admin-category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('admin-category/add-category', [CategoryController::class, 'create'])->name('category.create');
        Route::post('admin-category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('admin-category/{category:id}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('admin-category/{category:id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::patch('admin-category/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('admin-category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

        // Income routes
        Route::get('admin-income', [IncomeController::class, 'index'])->name('income.index');
        Route::get('admin-income/add-income', [IncomeController::class, 'createIncome'])->name('income.create');
        Route::post('admin-income', [IncomeController::class, 'store'])->name('income.store');
        Route::get('admin-income/{income:id_trax_pendapatan}', [IncomeController::class, 'show'])->name('income.show');
        Route::get('admin-income/{income:id_trax_pendapatan}/edit', [IncomeController::class, 'edit'])->name('income.edit');
        Route::patch('admin-income/{income}', [IncomeController::class, 'update'])->name('income.update');
        Route::delete('admin-income/{income}', [IncomeController::class, 'destroy'])->name('income.destroy');
        Route::get('admin-income/income/report', [IncomeController::class, 'report'])->name('income.report');

        // Expense routes
        Route::get('admin-expense', [ExpenseController::class, 'index'])->name('expense.index');
        Route::get('admin-expense/add-expense', [ExpenseController::class, 'createExpense'])->name('expense.create');
        Route::post('admin-expense', [ExpenseController::class, 'store'])->name('expense.store');
        Route::get('admin-expense/{expense:id_trax_perbelanjaan}', [ExpenseController::class, 'show'])->name('expense.show');
        Route::get('admin-expense/{expense:id_trax_perbelanjaan}/edit', [ExpenseController::class, 'edit'])->name('expense.edit');
        Route::patch('admin-expense/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
        Route::delete('admin-expense/{expense}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
        Route::get('admin-expense/expense/report', [ExpenseController::class, 'report'])->name('expense.report');

        // Application routes
        Route::get('admin-application/report-application', [ApplicationController::class, 'reportList'])->name('application.print');

        Route::get('application-approval', [ApplicationController::class, 'viewApplicationApproval'])->name('application-approval.index');
        Route::get('application-approval/{application:id_permohonan}/edit', [ApplicationController::class, 'editApplicationApproval'])->name('application-approval.edit');
        Route::patch('application-approval/{application}', [ApplicationController::class, 'updateApplicationApproval'])->name('application-approval.update');

        Route::get('application-record', [ApplicationController::class, 'viewApplicationRecord'])->name('application-record.index');
        Route::get('application-record/{application:id_permohonan}/edit', [ApplicationController::class, 'editApplicationRecord'])->name('application-record.edit');
        Route::patch('application-record/{application}', [ApplicationController::class, 'updateApplicationRecord'])->name('application-record.update');

        Route::get('application-registration', [ApplicationController::class, 'viewApplicationRegistration'])->name('application-registration.index');
        Route::get('application-registration/{application:id_permohonan}/edit', [ApplicationController::class, 'editApplicationRegistration'])->name('application-registration.edit');
        Route::patch('application-registration/{application}', [ApplicationController::class, 'updateApplicationRegistration'])->name('application-registration.update');

        // Orphan routes
        Route::get('admin-orphan', [OrphanController::class, 'index'])->name('orphan.index');
        Route::get('admin-orphan/orphan/report-orphan', [OrphanController::class, 'reportList'])->name('orphan.print');
        Route::get('admin-orphan/orphan/add-orphan', [OrphanController::class, 'create'])->name('orphan.create');
        Route::post('admin-orphan', [OrphanController::class, 'store'])->name('orphan.store');
        Route::get('admin-orphan/{orphan:id_anak_jagaan}/edit', [OrphanController::class, 'edit'])->name('orphan.edit');
        Route::patch('admin-orphan/{orphan}', [OrphanController::class, 'update'])->name('orphan.update');
        Route::delete('admin-orphan/{orphan}', [OrphanController::class, 'destroy'])->name('orphan.destroy');
    });
});
