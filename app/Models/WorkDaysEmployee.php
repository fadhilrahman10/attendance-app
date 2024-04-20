<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDaysEmployee extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'work_days_employee';

    protected $guarded = [];
}
