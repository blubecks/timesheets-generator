<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheet extends Model
{
    use HasFactory, SoftDeletes;


     /**
     * Get the employee from the timesheet.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
