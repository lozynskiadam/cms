<?php

namespace App\Contracts;

use App\Enums\FileRelation;
use App\Models\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property Collection<File> $files
 */
interface InteractsWithFiles
{
    public function files(FileRelation $relation = null): MorphToMany;
}
