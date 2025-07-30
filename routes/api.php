<?php

namespace App\Http\Controllers;

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
Route::apiResource('answers', answerController::class);
Route::apiResource('averages', averageController::class);
Route::apiResource('trainers', trainerController::class);
Route::apiResource('veterinaries', veterinaryController::class);
Route::apiResource('shelters', shelterController::class);
Route::apiResource('pets', petController::class);
Route::apiResource('adoptions', adoptionController::class);
Route::apiResource('appointments', appointmentController::class);
Route::apiResource('notifications', notificationController::class);
Route::apiResource('requestts', requesttController::class);
Route::apiResource('services', serviceController::class);
Route::apiResource('shoppingcars', shoppingcarController::class);
Route::apiResource('orders', orderController::class);
Route::apiResource('shipments', shipmentController::class);
Route::apiResource('categories', categoryController::class);
Route::apiResource('products', productController::class);
Route::apiResource('inventories', inventoryController::class);
Route::apiResource('orderitmes', orderitemController::class);
Route::apiResource('payments', paymentController::class);
Route::apiResource('paymentmethos', paymentmethoController::class);
Route::apiResource('users', userController::class);