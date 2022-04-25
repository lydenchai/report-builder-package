<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ReportBuilder\PageBuilder\Http\Controllers\ReportBuilderController;

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

Route::middleware('auth:api')->get('/page', function (Request $request) {
    return $request->user();
});
Route::get('/reportbuilder', [ReportBuilderController::class, 'index']);
Route::get('/reportbuilder/{id}', [ReportBuilderController::class, 'show']);
Route::post('/reportbuilder', [ReportBuilderController::class, 'store']);
Route::put('/reportbuilder/{id}', [ReportBuilderController::class, 'update']);
Route::delete('/reportbuilder/{id}', [ReportBuilderController::class, 'destroy']);