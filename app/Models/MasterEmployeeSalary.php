<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MasterEmployeeSalary extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'master_employee_salary';

    protected $guarded = [];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(MasterEmployee::class, 'employee_id');
    }
}
