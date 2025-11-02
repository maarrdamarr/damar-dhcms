<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    protected $fillable = [
        'employee_id',
        'period_month',
        'basic_salary',
        'allowance',
        'deduction',
        'net_salary',
        'is_distributed',
    ];

    public function employee(): BelongsTo
    {
        // employee_id mengarah ke tabel users
        return $this->belongsTo(User::class, 'employee_id');
    }
}
