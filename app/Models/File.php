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

    public function getFormattedSize(): string
    {
        return match (true) {
            $this->size > 1000000000 => round($this->size/1000000000, 2) . ' GB',
            $this->size > 1000000 => round($this->size/1000000, 2) . ' MB',
            $this->size > 1000 => round($this->size/1000, 2) . ' KB',
            default => $this->size . ' B',
        };
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'file_to_model');
    }
}
