<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidate extends Model
{
    protected $fillable = [
        'hr_job_id',
        'name',
        'email',
        'phone',
        'status',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(HrJob::class, 'hr_job_id');
    }
}
