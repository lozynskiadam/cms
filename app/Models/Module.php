<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $description
 * @property string $depends_on
 * @property bool $is_enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Module extends Model
{
    use HasFactory;

    protected $casts = [
        'is_enabled' => 'boolean'
    ];

    public static function isEnabled(string $name): bool
    {
        return Module::where(['name' => $name, 'is_enabled' => true])->exists();
    }

    public function isAvailable(): bool
    {
        if (!$this->depends_on) {
            return true;
        }

        foreach (explode(',', $this->depends_on) as $name) {
            if (!$module = Module::where(['name' => $name])->first()) {
                return false;
            }
            if (!$module->is_enabled) {
                return false;
            }
        }

        return true;
    }
}