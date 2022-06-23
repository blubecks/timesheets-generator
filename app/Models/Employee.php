<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['last_name'];


     /**
     * Get the projects for the employee.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'efforts');
    }

    /**
     * Get the worksheets for the employee.
     */
    public function worksheets()
    {
        return $this->hasMany(Worksheet::class);
    }
}
