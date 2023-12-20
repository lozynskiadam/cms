<?php

namespace App\Contracts;

use App\Models\File;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasFiles
{
    public function files(): MorphToMany
    {
        return $this->morphToMany(File::class, 'file_to_model');
    }
}
