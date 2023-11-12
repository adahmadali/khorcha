<?php

use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;

use App\Http\Controllers\ArchiveController;

use App\Http\Controllers\RecycleController;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\ManageController;

Route::get('/', function () {
    return view('auth.login');
});

// admin section start
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/dashboard/user', [UserController::class, 'index'])->name('all-user');
Route::get('/dashboard/user/add', [UserController::class, 'add'])->name('add-user');
Route::get('/dashboard/user/edit/{slug}', [UserController::class, 'edit'])->name('edit-user');
Route::get('/dashboard/user/view/{slug}', [UserController::class, 'view'])->name('view-user');
Route::post('/dashboard/user/submit', [UserController::class, 'insert'])->name('insert.user');
Route::post('/dashboard/user/update', [UserController::class, 'update'])->name('update.user');
Route::post('/dashboard/user/softdelete', [UserController::class, 'softdelete'])->name('softDelete-user');
Route::post('/dashboard/user/restore', [UserController::class, 'restore'])->name('restore-user');
Route::post('/dashboard/user/delete', [UserController::class, 'delete'])->name('delete-user');

Route::get('/dashboard/income', [IncomeController::class, 'index'])->name('all-income');
Route::get('/dashboard/income/add', [IncomeController::class, 'add'])->name('add-income');
Route::get('/dashboard/income/edit/{slug}', [IncomeController::class, 'edit'])->name('edit-income');
Route::get('/dashboard/income/view/{slug}', [IncomeController::class, 'view'])->name('view-income');
Route::post('/dashboard/income/submit', [IncomeController::class, 'insert'])->name('insert-income');
Route::post('/dashboard/income/update', [IncomeController::class, 'update'])->name('update-income');
Route::post('/dashboard/income/softdelete', [IncomeController::class, 'softdelete'])->name('softDelete-income');
Route::post('/dashboard/income/restore', [IncomeController::class, 'restore'])->name('restore-income');
Route::post('/dashboard/income/delete', [IncomeController::class, 'delete'])->name('delete-income');
Route::get('/dashboard/income/pdf', [IncomeController::class, 'pdf'])->name('pdf-income');
Route::get('/dashboard/income/excel', [IncomeController::class, 'excel'])->name('excel-income');

Route::get('/dashboard/income/category', [IncomeCategoryController::class, 'index'])->name('all-in-cate');
Route::get('/dashboard/income/category/add', [IncomeCategoryController::class, 'add'])->name('add-in-cate');
Route::get('/dashboard/income/category/edit/{slug}', [IncomeCategoryController::class, 'edit'])->name('edit-in-cate');
Route::get('/dashboard/income/category/view/{slug}', [IncomeCategoryController::class, 'view'])->name('view-in-cate');
Route::post('/dashboard/income/category/submit', [IncomeCategoryController::class, 'insert'])->name('insert-in-cate');
Route::post('/dashboard/income/category/update', [IncomeCategoryController::class, 'update'])->name('update-in-cate');
Route::post('/dashboard/income/category/softdelete', [IncomeCategoryController::class, 'softDelete'])->name('softDelete-in-cate');
Route::post('/dashboard/income/category/restore', [IncomeCategoryController::class, 'restore'])->name('restore-in-cate');
Route::post('/dashboard/income/category/delete', [IncomeCategoryController::class, 'delete'])->name('delete-in-cate');

Route::get('/dashboard/expense/', [ExpenseController::class, 'index'])->name('all-expense');
Route::get('/dashboard/expense/add', [ExpenseController::class, 'add'])->name('add-expense');
Route::get('/dashboard/expense/edit/{slug}', [ExpenseController::class, 'edit'])->name('edit-expense');
Route::get('/dashboard/expense/view/{slug}', [ExpenseController::class, 'view'])->name('view-expense');
Route::post('/dashboard/expense/submit', [ExpenseController::class, 'insert'])->name('insert-expense');
Route::post('/dashboard/expense/update', [ExpenseController::class, 'update'])->name('update-expense');
Route::post('/dashboard/expense/softdelete', [ExpenseController::class, 'softdelete'])->name('softDelete-expense');
Route::post('/dashboard/expense/restore', [ExpenseController::class, 'restore'])->name('restore-expense');
Route::post('/dashboard/expense/delete', [ExpenseController::class, 'delete'])->name('delete-expense');

Route::get('/dashboard/expense/category/', [ExpenseCategoryController::class, 'index'])->name('all-ex-cate');
Route::get('/dashboard/expense/category/add', [ExpenseCategoryController::class, 'add'])->name('add-ex-cate');
Route::get('/dashboard/expense/category/edit/{slug}', [ExpenseCategoryController::class, 'edit'])->name('edit-ex-cate');
Route::get('/dashboard/expense/category/view/{slug}', [ExpenseCategoryController::class, 'view'])->name('view-ex-cate');
Route::post('/dashboard/expense/category/submit', [ExpenseCategoryController::class, 'insert'])->name('insert-ex-cate');
Route::post('/dashboard/expense/category/update', [ExpenseCategoryController::class, 'update'])->name('update-ex-cate');
Route::post('/dashboard/expense/category/softdelete', [ExpenseCategoryController::class, 'softdelete'])->name('softDelete-ex-cate');
Route::post('/dashboard/expense/category/restore', [ExpenseCategoryController::class, 'restore'])->name('restore-ex-cate');
Route::post('/dashboard/expense/category/delete', [ExpenseCategoryController::class, 'delete'])->name('delete-ex-cate');

Route::get('/dashboard/recycle/', [RecycleController::class, 'index'])->name('recycleBin');
Route::get('/dashboard/recycle/user', [RecycleController::class, 'user'])->name('user');
Route::get('/dashboard/recycle/income', [RecycleController::class, 'income'])->name('');
Route::get('/dashboard/recycle/expense', [RecycleController::class, 'expense'])->name('');
Route::get('/dashboard/recycle/income/category', [RecycleController::class, 'incomeCategory'])->name('');
Route::get('/dashboard/recycle/expense/category', [RecycleController::class, 'expenseCategory'])->name('');

// report all route
Route::get('/dashboard/report/', [ReportController::class, 'index'])->name('');

Route::get('/dashboard/report/summary', [ReportController::class, 'summary'])->name('summary');
Route::get('/dashboard/report/summary/pdf', [ReportController::class, 'summaryPdf'])->name('summary.pdf');
Route::get('/dashboard/report/summary/excel', [ReportController::class, 'summaryExcel'])->name('summary.excel');

Route::get('/dashboard/report/current/month', [ReportController::class, 'currentMonth'])->name('current.month');
Route::get('/dashboard/report/current/month/pdf', [ReportController::class, 'currentMonthPdf'])->name('current.month.pdf');
Route::get('/dashboard/report/current/month/excel', [ReportController::class, 'currentMonthExcel'])->name('current.month.excel');

Route::get('/dashboard/archive', [ArchiveController::class, 'index'])->name('archive');
Route::get('/dashboard/archive/month/{month_year}', [ArchiveController::class, 'monthArchive'])->name('month.archive');

Route::controller(ManageController::class)->group(function (){
    Route::get('/dashboard/manage','index')->name('manage');
    Route::get('/dashboard/manage/basic','basic')->name('basic');
    Route::get('/dashboard/manage/contact','contact')->name('contact');
    Route::get('/dashboard/manage/social','socialMedia')->name('socialMedia');
});

require __DIR__ . '/auth.php';
