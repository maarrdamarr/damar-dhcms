<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HrJob extends Model
{
    protected $table = 'hr_jobs';

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class, 'hr_job_id');
    }
}
