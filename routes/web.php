<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\WorksheetController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});




Route::group(['middleware'=>'auth'], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('worksheets', WorksheetController::class);
    Route::get('worksheet/csv', [WorksheetController::class, 'worksheet_csv'])->name('worksheets.get_csv');
    
    Route::resource('projects', ProjectController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('timesheets', TimesheetController::class);

    Route::get('employees/timesheets/{employee}', [EmployeeController::class, 'timesheectListing'])->name('employees.timesheets');
    Route::get('pdf/generate/{employee}/{project}/{year}/{month}', [PDFController::class, 'generatePDF'])->name('pdf.generate');
    
});



require __DIR__.'/auth.php';
