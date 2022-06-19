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

    public function user(): BelongsTo {
        return $this->belongTo(User::class);
    }

    public function experiences(): HasMany {
        return $this->belongTo(Experience::class);
    }

    public function links(): HasMany {
        return $this->belongTo(Link::class);
    }
}
