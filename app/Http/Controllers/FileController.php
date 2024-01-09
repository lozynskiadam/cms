<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Services\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function delete(File $file): RedirectResponse
    {
        $file->delete();
        Alert::success("File \"{$file->name}\" has been deleted successfully.");

        return redirect(route('files.index'));
    }

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
