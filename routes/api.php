<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
Route::apiResource('orderitems', orderitemController::class);
Route::apiResource('payments', paymentController::class);
Route::apiResource('paymentmethos', paymentmethoController::class);
Route::apiResource('users', UserController::class);

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/roles', [AuthController::class, 'getRoles']);

Route::middleware('auth:api')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);

    // Rutas por rol
    Route::middleware('role:1')->group(function () {
        Route::get('/veterinarian/dashboard', function () {
            return response()->json(['message' => 'Dashboard Veterinario']);
        });
    });

    Route::middleware('role:2')->group(function () {
        Route::get('/trainer/dashboard', function () {
            return response()->json(['message' => 'Dashboard Entrenador']);
        });
    });

    Route::middleware('role:3')->group(function () {
        Route::get('/client/dashboard', function () {
            return response()->json(['message' => 'Dashboard Cliente']);
        });
    });

    Route::middleware('role:4')->group(function () {
        Route::get('/shelter/dashboard', function () {
            return response()->json(['message' => 'Dashboard Refugio']);
        });
    });
});