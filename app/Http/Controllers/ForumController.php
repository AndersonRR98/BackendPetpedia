<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ForumController extends Controller
{
    public function index()
{
    try {
        $forums = Forum::with(['user' => function($query) {
            $query->select('id', 'name', 'email');
        }])->latest()->get();

        // ✅ Los comentarios se convierten automáticamente a array gracias al cast
        return response()->json([
            'success' => true,
            'data' => $forums
        ]);

    } catch (\Exception $e) {
        Log::error('Error fetching forums: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Error al cargar los posts del foro'
        ], 500);
    }
}

 public function store(Request $request)
{
    try {
        \Log::info('=== CREANDO NUEVO POST ===');
        
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|string'
        ]);

        $forum = Forum::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image,
            'creation_date' => now(),
            'user_id' => auth()->id(),
            'likes_count' => 0,
            'comments_count' => 0,
            'comments' => [] // ✅ Enviar array vacío en lugar de json_encode([])
        ]);

        \Log::info('Post creado exitosamente', ['post_id' => $forum->id]);

        // ✅ Cargar el post con los comentarios ya convertidos a array
        $forum->load(['user' => function($query) {
            $query->select('id', 'name', 'email');
        }]);

        return response()->json([
            'success' => true,
            'message' => 'Post creado exitosamente',
            'data' => $forum
        ], 201);

    } catch (\Exception $e) {
        \Log::error('Error creating forum post: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Error al crear el post: ' . $e->getMessage()
        ], 500);
    }
}

    public function addComment(Request $request, Forum $forum) // ✅ Cambiar a Forum $forum
{
    try {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        // ✅ Ya no necesitas buscar el forum, Laravel lo hace automáticamente
        if (!$forum) {
            return response()->json([
                'success' => false,
                'message' => 'Post no encontrado'
            ], 404);
        }

        \Log::info('Agregando comentario', [
            'forum_id' => $forum->id,
            'user_id' => auth()->id(),
            'content' => $request->content
        ]);

        $comment = $forum->addComment(
            auth()->id(),
            auth()->user()->name,
            $request->content
        );

        \Log::info('Comentario agregado exitosamente', [
            'comment_id' => $comment['id']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comentario agregado exitosamente',
            'data' => $forum->fresh(['user' => function($query) {
                $query->select('id', 'name', 'email');
            }])
        ]);

    } catch (\Exception $e) {
        \Log::error('Error adding comment: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error al agregar el comentario: ' . $e->getMessage()
        ], 500);
    }
}

    public function toggleLike(Forum $forum)
    {
        try {
            // Verificar que el forum existe
            if (!$forum) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post no encontrado'
                ], 404);
            }

            // En una app real, aquí verificarías si el usuario ya dio like
            // y harías toggle (like/unlike). Por ahora solo incrementamos.
            $forum->increment('likes_count');
            
            return response()->json([
                'success' => true,
                'message' => 'Like agregado',
                'likes_count' => $forum->likes_count
            ]);

        } catch (\Exception $e) {
            Log::error('Error toggling like: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al dar like'
            ], 500);
        }
    }

    // Método adicional para obtener un post específico
    public function show(Forum $forum)
    {
        try {
            if (!$forum) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $forum->load(['user' => function($query) {
                    $query->select('id', 'name', 'email');
                }])
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching forum post: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar el post'
            ], 500);
        }
    }

    // Método para eliminar un post (opcional)
    public function destroy(Forum $forum)
    {
        try {
            // Verificar que el usuario es el dueño del post
            if ($forum->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No tienes permiso para eliminar este post'
                ], 403);
            }

            $forum->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post eliminado exitosamente'
            ]);

        } catch (\Exception $e) {
            Log::error('Error deleting forum post: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el post'
            ], 500);
        }
    }
}