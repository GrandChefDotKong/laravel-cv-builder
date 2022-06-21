<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo {
        return $this->belongTo(
            related: User::class,
            foreignKey: 'profile_id'
        );
    }

    public function experiences(): HasMany {
        return $this->hasMany(
            related: Experience::class,
            foreignKey: 'profile_id'
        );
    }

    public function links(): HasMany {
        return $this->hasMany(
            related : Link::class,
            foreignKey: 'profile_id'
        );
    }
}
