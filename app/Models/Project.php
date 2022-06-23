<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * Get the employees for the project.
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'efforts');
    }
}
