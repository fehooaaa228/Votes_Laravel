<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

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

Route::get('/', [VoteController::class, 'showAll']);

Route::get('/vote/create', function(){
    return view('create_vote');
});

Route::post('/vote/create', [VoteController::class, 'create']);

Route::get('/vote/show/{id}', [VoteController::class, 'showVote']);

Route::get('/vote/posInc/{id}', [VoteController::class, 'incPos']);

Route::get('/vote/negInc/{id}', [VoteController::class, 'incNeg']);
