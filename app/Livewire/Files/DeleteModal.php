<?php

namespace App\Livewire\Files;

use App\Models\File;
use App\Services\Alert;
use App\View\Components\ModalComponent;
use Exception;

class DeleteModal extends ModalComponent
{
    public File $file;

    public function setup(File $file): void
    {
        $this->file = $file;
    }

    public function submit(): void
    {
        try {
            $this->file->delete();
            Alert::success("File \"{$this->file->name}\" has been deleted successfully.");
            $this->redirect(route('files.index'));
        } catch (Exception $exception) {
            $this->toast($exception->getMessage(), 'error');
        }
        $this->close();
    }
}
