<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Obtener pedidos de un usuario específico - VERSIÓN SIMPLIFICADA
     */
    public function getByUser($userId)
    {
        try {
            Log::info("📦 Obteniendo pedidos para usuario ID: " . $userId);
            
            // Verificar que el usuario existe
            $user = User::find($userId);
            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }
            
            // ✅ VERSIÓN SUPER SIMPLE - sin scopes complicados
            $orders = Order::where('user_id', $userId)
                ->with(['orderItems.product']) // Relación corregida
                ->orderBy('created_at', 'desc')
                ->get();
                
            Log::info("✅ Pedidos encontrados: " . $orders->count());
            
            return response()->json($orders);
            
        } catch (\Exception $e) {
            Log::error("💥 Error: " . $e->getMessage());
            return response()->json([
                'error' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener todos los pedidos
     */
    public function index()
    {
        try {
            $orders = Order::with(['orderItems.product'])
                ->orderBy('created_at', 'desc')
                ->get();
                
            return response()->json($orders);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Crear pedido
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'total_amount' => 'required|numeric',
                'order_date' => 'required|date',
                'status' => 'required|string',
                'items' => 'required|array|min:1',
                'items.*.product_id' => 'required|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1',
                'items.*.price' => 'required|numeric'
            ]);

            // Crear orden
            $order = Order::create([
                'user_id' => $validated['user_id'],
                'total_amount' => $validated['total_amount'],
                'order_date' => $validated['order_date'],
                'status' => $validated['status']
            ]);

            // Crear items
            foreach ($validated['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            DB::commit();
            
            // Cargar orden con relaciones
            $orderWithRelations = Order::with(['orderItems.product'])->find($order->id);
            
            return response()->json($orderWithRelations, 201);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}