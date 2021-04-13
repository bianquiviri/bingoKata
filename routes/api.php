<?php
    
    use App\Models\Card;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::get('/games', [\App\Http\Controllers\GameController::class, 'index']);
    Route::get('/newgame', [\App\Http\Controllers\GameController::class, 'create']);
    Route::get('/game/{idgame}/cards', [\App\Http\Controllers\GameController::class, 'cards']);
    Route::get('/game/{idgame}/card/{id}', [\App\Http\Controllers\GameController::class, 'cardDetail']);
    Route::get('/game/{idgame}/winner', [\App\Http\Controllers\GameController::class, 'winner']);
