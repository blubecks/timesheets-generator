<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheet extends Model
{
    use HasFactory, SoftDeletes;

    public function project(){
        return $this->belongsTo(Project::class);
    }
    
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

}
