<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
estas son rutas puntuales que se pueden usar para autenticar usuarios, obtener información del usuario autenticado, cerrar sesión y refrescar el token de acceso.
Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
*/
Route::apiResource('forums', ForumController::class);
Route::apiResource('topics', TopicController::class);
Route::apiResource('answers', TopicController::class);
Route::apiResource('averages', TopicController::class);
Route::apiResource('trainers', TopicController::class);
Route::apiResource('veterinaries', TopicController::class);
Route::apiResource('shelters', TopicController::class);
Route::apiResource('pets', TopicController::class);
Route::apiResource('adoptions', TopicController::class);
Route::apiResource('appointments', TopicController::class);
Route::apiResource('notifications', TopicController::class);
Route::apiResource('requestts', TopicController::class);
Route::apiResource('services', TopicController::class);
Route::apiResource('shoppingcars', TopicController::class);
Route::apiResource('orders', TopicController::class);
Route::apiResource('shipments', TopicController::class);
Route::apiResource('categories', TopicController::class);
Route::apiResource('products', TopicController::class);
Route::apiResource('inventories', TopicController::class);
Route::apiResource('orderitmes', TopicController::class);
Route::apiResource('payments', TopicController::class);
Route::apiResource('paymentmethos', TopicController::class);
Route::apiResource('topics', TopicController::class);
Route::apiResource('topics', TopicController::class);
Route::apiResource('topics', TopicController::class);