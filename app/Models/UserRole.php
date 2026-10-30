<?php

namespace App\Models;

use Database\Factories\UserRoleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'role_id'])]
class UserRole extends Model
{
    /** @use HasFactory<UserRoleFactory> */
    use HasFactory;

    // Return the source role
    /** @return BelongsTo<Role, $this> */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
