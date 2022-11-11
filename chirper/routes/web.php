<?php

use App\Http\Controllers\ChirpController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//A resource route is used to connect to a resource controller. The only thing
//that is special about a resource controller is that it comes out of the box
//with some pre-typed out code for basic CRUD operations. When you define a
//resource route to one of these controllers, by default it will act as a
//separate route to each one of the pre-built functions in the resource
//controller. Those functions are 'index', 'create', 'store', 'show', 'edit',
//'update', and 'destroy'. The use of the ->only() function below is stating
//that any route not mentioned in the array is to be omitted. 

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
