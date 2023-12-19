<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Services\Alert;
use Illuminate\Http\RedirectResponse;
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
}
