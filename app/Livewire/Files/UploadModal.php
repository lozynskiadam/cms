<?php

namespace App\Livewire\Files;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class UploadModal extends Component
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $file = null;

    public function rules(): array
    {
        return [
            'file' => 'required|image|max:1024', // 1MB Max
        ];
    }

    public function update(): void
    {
        $this->validate();

        $this->file->store();

        $this->file = null;

        $this->closeModal();
        $this->toast('OK');
    }

    protected function closeModal(): void
    {
        $this->js("bootstrap.Modal.getInstance(document.querySelector('#file-upload-modal')).hide();");
    }

    protected function toast(string $value): void
    {
        $this->js("
            toastr['success']('{$value}', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
