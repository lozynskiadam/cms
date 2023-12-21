<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Services\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FileController extends Controller
{
    public function index(): View
    {
        return view('pages.files.index');
    }

    public function view(File $file): View
    {
        return view('pages.files.view', [
            'model' => $file
        ]);
    }

    public function delete(File $file): RedirectResponse
    {
        $file->delete();
        Alert::success("File \"{$file->name}\" has been deleted successfully.");

        return redirect(route('files.index'));
    }

    public function get(File $file): Response
    {
        if (!Storage::disk('local')->exists($file->id)) {
            abort(404, 'File not found.');
        }

        $response = new Response(Storage::disk('local')->get($file->id));
        $response->header('Content-Type', Storage::mimeType($file->name));
        $response->header('Content-Disposition', 'inline; filename="' . $file->name . '"');

        return $response;
    }

    public function download(File $file): Response
    {
        if (!Storage::disk('local')->exists($file->id)) {
            abort(404, 'File not found.');
        }

        $response = new Response(Storage::disk('local')->get($file->id));
        $response->header('Content-Type', Storage::mimeType($file->name));
        $response->header('Content-Disposition', 'attachment; filename="' . $file->name . '"');

        return $response;
    }
}
