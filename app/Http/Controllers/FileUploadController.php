<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function quill_upload_image(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $path = $request->file('image')->store('public/images');
        $url = asset(\Illuminate\Support\Facades\Storage::url($path));
        return response()->json(['url' => $url]);
    }
}
