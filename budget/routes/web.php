<?php

use App\Http\Controllers\BudgetController;
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
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/budget', [BudgetController::class, 'index'])
        ->name('budget');
    
    Route::get('/additem', [BudgetController::class, 'create'])
        ->name('add-item');
    
    Route::post('/budget', [BudgetController::class, 'store'])
        ->name('save-item');
    
    Route::get('/edit', [BudgetController::class, 'edit'])
        ->name('edit');

    Route::post('/update/{item}', [BudgetController::class, 'update'])
        ->name('update');

    Route::post('/delete/{item}', [BudgetController::class, 'destroy'])
        ->name('delete');

    //

});

require __DIR__.'/auth.php';
