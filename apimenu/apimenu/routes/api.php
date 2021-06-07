<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparacionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Versionado de la API.
Route::prefix('v1')->group(function () {

    // resource recibe nos parámetros(URI del recurso, Controlador que gestionará las peticiones)
    //Route::resource('preparacion','PreparacionController::class',['except'=>['edit','create'] ]);   // Todos los métodos menos Edit que mostraría un formulario de edición.
    Route::get('/preparacion', [PreparacionController::class, 'index']);
    Route::get('/preparacion/{id}', [PreparacionController::class, 'show']);
    Route::post('/preparacion', [PreparacionController::class, 'store']);
    Route::put('/preparacion/{id}', [PreparacionController::class, 'update']);
    Route::delete('/preparacion/{id}', [PreparacionController::class, 'destroy']);
});
