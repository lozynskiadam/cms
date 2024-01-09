<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function get(File $file): Response
    {
        if (!Storage::disk('uploads')->exists($file->id)) {
            abort(404, 'File not found.');
        }

        $response = new Response(Storage::disk('uploads')->get($file->id));
        $response->header('Content-Type', $file->type);
        $response->header('Content-Disposition', 'inline; filename="' . $file->name . '"');

        return $response;
    }

    public function download(File $file): Response
    {
        if (!Storage::disk('uploads')->exists($file->id)) {
            abort(404, 'File not found.');
        }

        $response = new Response(Storage::disk('uploads')->get($file->id));
        $response->header('Content-Type', $file->type);
        $response->header('Content-Disposition', 'attachment; filename="' . $file->name . '"');

        return $response;
    }
}
