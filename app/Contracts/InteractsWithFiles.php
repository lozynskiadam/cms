<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface InteractsWithFiles
{
    public function files(): MorphToMany;
}
