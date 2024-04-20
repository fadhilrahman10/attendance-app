<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterEmployee extends Model
{
    use HasUuids;

    protected $table = 'master_employee';
    protected $guarded = [];

    public function salaries() :HasMany
    {
        return $this->hasMany(MasterEmployeeSalary::class, 'employee_id', 'id');
    }
}
