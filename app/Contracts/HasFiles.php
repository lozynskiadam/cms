<?php

namespace App\Contracts;

use App\Enums\FileRelation;
use App\Models\File;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasFiles
{
    public function files(FileRelation $relation = null): MorphToMany
    {
        $query = $this->morphToMany(File::class, 'file_to_model')->withPivot('relation');
        if ($relation !== null) {
            $query->wherePivot('relation', $relation->value);
        }

        return $query;
    }
}
