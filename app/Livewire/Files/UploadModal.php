<?php

namespace App\Livewire\Files;

use App\Models\File;
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
            'file' => 'required|max:100000', // 100MB Max
        ];
    }

    public function update(): void
    {
        $this->validate();

        $file = new File;
        $file->name = $this->file->getClientOriginalName();
        $file->type = $this->file->getMimeType();
        $file->size = $this->file->getSize();
        $file->is_private = false;
        $file->checksum = md5_file($this->file->getRealPath());
        $file->save();

        $this->file->storeAs('uploads', $file->id);
        $this->file = null;

        $this->closeModal();
        $this->toast(message: "Pomyślnie wgrano plik \"{$file->name}\".", type: 'success');

        $this->dispatch('pg:eventRefresh-default')->to(Listing::class);
    }

    protected function closeModal(): void
    {
        $this->js("bootstrap.Modal.getInstance(document.querySelector('#file-upload-modal')).hide();");
    }

    protected function toast(string $message, string $type): void
    {
        $this->js("
            toastr['{$type}']('{$message}', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
