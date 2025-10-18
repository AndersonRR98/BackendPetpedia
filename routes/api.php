<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// 🔹 Servicios por entrenador
Route::get('/services/trainer/{id}', [ServiceController::class, 'getByTrainer']);

// 🔹 Solicitudes por entrenador
Route::get('/requestts/trainer/{id}', [RequesttController::class, 'getByTrainer']);

// 🔹 Aceptar/Rechazar solicitudes
Route::post('/requestts/{id}/accept', [RequesttController::class, 'accept']);
Route::post('/requestts/{id}/reject', [RequesttController::class, 'reject']);

// ✅ AHORA SÍ LOS apiResource
Route::apiResource('answers', answerController::class);
Route::apiResource('averages', averageController::class);
Route::apiResource('trainers', trainerController::class);
Route::apiResource('veterinaries', veterinaryController::class);
Route::apiResource('shelters', shelterController::class);
Route::apiResource('pets', petController::class);
Route::apiResource('adoptions', adoptionController::class);
Route::apiResource('appointments', appointmentController::class);
Route::apiResource('forums', ForumController::class);
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
Route::apiResource('profile', ProfileController::class);


// -------------------- Autenticación --------------------
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/roles', [AuthController::class, 'getRoles']);

    Route::middleware('auth:api')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });
});

Route::middleware(['auth:api'])->group(function () {
    Route::middleware('role:1')->get('/client/dashboard', function () {
        return response()->json(['message' => 'Dashboard Cliente']);
    });

    Route::middleware('role:2')->get('/veterinary/dashboard', function () {
        return response()->json(['message' => 'Dashboard Veterinaria']);
    });

    Route::middleware('role:3')->get('/trainer/dashboard', function () {
        return response()->json(['message' => 'Dashboard Entrenador']);
    });

    Route::middleware('role:4')->get('/shelter/dashboard', function () {
        return response()->json(['message' => 'Dashboard Refugio']);
    });
    // rutas que permiten actualizar el perfil y mostrar el perfil de un usuaio 
     Route::middleware('auth:api')->put('/profile', [ProfileController::class, 'update']);
     Route::middleware('auth:api')->get('/users/{id}', [ProfileController::class, 'show']);


    //rutas agregadas para foros y ordenes para el aplicativo movil 
    Route::post('/forums', [ForumController::class, 'store']);
    Route::post('/forums/{forum}/comments', [ForumController::class, 'addComment']);
    Route::post('/forums/{forum}/like', [ForumController::class, 'toggleLike']);
    Route::delete('/forums/{forum}', [ForumController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/user/{userId}', [OrderController::class, 'getByUser']);
    Route::post('orders', [OrderController::class, 'store']);

    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/user/appointments', [AppointmentController::class, 'getUserAppointments']);
});