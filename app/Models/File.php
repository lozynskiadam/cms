<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $size
 * @property string $checksum
 * @property bool $is_private
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class File extends Model
{
    use HasFactory;

    protected $casts = [
        'is_private' => 'boolean'
    ];
}
