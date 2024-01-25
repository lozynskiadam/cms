<?php

namespace App\Livewire\Files\Components;

use App\Models\File;
use App\View\Components\ModalComponent;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class UploadModal extends ModalComponent
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $file = null;

    public function title(): string
    {
        return 'Wgraj plik';
    }

    public function rules(): array
    {
        return [
            'file' => 'required|max:100000', // 100MB Max
        ];
    }

    public function submit(): void
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

        $this->close();
        $this->toast(message: "Pomyślnie wgrano plik \"{$file->name}\".", type: 'success');
        $this->dispatch('$refresh');
    }
}
