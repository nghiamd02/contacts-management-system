<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/hello-world', [ContactController::class, 'hello']) -> name('hello-world.index');

Route::get('/contacts/{id}', [ContactController::class, 'find_contact_by_id']) -> name('contacts.show');

Route::get('/contacts', [ContactController::class, 'index']) -> name('contacts.index');

Route::get('/create', [ContactController::class, 'create']) -> name('contacts.create');

Route::post('/contacts', [ContactController::class, 'store'])-> name('contacts.store');

Route::put('/contacts/{id}', [ContactController::class, 'update'])-> name('contacts.update');

Route::get('/contacts/{id}/edit', [ContactController::class, 'edit']) -> name('contacts.edit');

Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])-> name('contacts.destroy');