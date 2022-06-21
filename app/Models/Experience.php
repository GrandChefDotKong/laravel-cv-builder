<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model  {

    use HasFactory;

    protected $fillable = [
        'description',
        'current',
        'started_at',
        'finished_at',
        'job_title_id',
        'company_id',
        'sort',
    ];

    protected $casts = [
        'current' => 'boolean', 
        'started_at' => 'date',
        'finished' => 'date',
    ];

    public function profile(): BelongsTo {
        return $this->belongsTo(
            related: Profile::class,
            foreignKey: 'profile_id' 
        );
    }
    
    public function jobTitle(): BelongsTo {
        return $this->belongsTo(
            related: JobTitle::class,
            foreignKey: 'job_title_id' 
        );
    }

    public function company(): BelongsTo {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id' 
        );
    } 

}
