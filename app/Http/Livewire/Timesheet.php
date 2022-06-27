<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Worksheet;
use Livewire\Component;

class Timesheet extends Component
{
    public $employees;
    public $employee;
    public $projects;
    public $project;

    public function mount(){
        $this->employees = Employee::all();
        $this->projects = Project::all();
    }


    public function render()
    {
        $worksheets = Worksheet::where('employee_id', $this->employee)->get();

        return view('livewire.timesheet', compact('worksheets'));
    }

}
