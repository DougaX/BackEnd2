<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'type' => 'required|in:document,image,avatar',
        ]);

        $file = $request->file('file');
        $type = $request->input('type');
        
        // Definir pasta baseada no tipo
        $folder = match($type) {
            'document' => 'documents',
            'image' => 'images',
            'avatar' => 'avatars',
            default => 'uploads'
        };

        // Gerar nome único para o arquivo
        $filename = time() . '_' . $file->getClientOriginalName();
        
        // Fazer upload
        $path = $file->storeAs($folder, $filename, 'public');
        
        return response()->json([
            'message' => 'Arquivo enviado com sucesso!',
            'data' => [
                'filename' => $filename,
                'path' => $path,
                'url' => Storage::url($path),
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
            ]
        ], 201);
    }

    public function delete(Request $request): JsonResponse
    {
        $request->validate([
            'path' => 'required|string',
        ]);

        $path = $request->input('path');
        
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            
            return response()->json([
                'message' => 'Arquivo deletado com sucesso!'
            ]);
        }

        return response()->json([
            'message' => 'Arquivo não encontrado!'
        ], 404);
    }
}