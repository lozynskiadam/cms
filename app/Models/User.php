<?php

namespace App\Models;

use App\Enums\UserStatus;
use App\Contracts\HasFiles;
use App\Contracts\InteractsWithFiles;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property UserStatus $status
 * @property Carbon|null $last_active_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class User extends Authenticatable implements InteractsWithFiles
{
    use Notifiable;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use HasFiles;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'status' => UserStatus::INACTIVE,
    ];

    protected $casts = [
        'last_active_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => UserStatus::class
    ];
}
