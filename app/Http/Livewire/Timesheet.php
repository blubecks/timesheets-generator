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
    public $month;
    public $year;
    public $timesheets;

    public function mount(){
        $this->employees = Employee::all()->sortBy('last_name');
        $this->projects = Project::all();
    }

    public function submit(){

        $employee = Employee::find($this->employee);
        $project = Project::find($this->project);

        foreach($this->timesheets as $timesheet){
            if(isset($timesheet['worked_hours'])){
                $worksheet = Worksheet::where([
                    ['employee_id', $this->employee],
                    ['day', $timesheet['day']],
                    ['available_hours','>=',$timesheet['worked_hours']]
                 ])->first();
                 if(is_null($worksheet)){
                    //errors, return to the form
                    dd("erorererere");
                 }
                
                $worksheet->available_hours -=  floatval($timesheet['worked_hours']);
                $worksheet->save();
                
                $timesheet_obj = new \App\Models\Timesheet;
                $timesheet_obj->day = $timesheet['day'];
                $timesheet_obj->worked_hours = floatval($timesheet['worked_hours']);
                $timesheet_obj->notes = $timesheet['notes'];
                $timesheet_obj->employee()->associate($employee);
                $timesheet_obj->project()->associate($project);
                $timesheet_obj->save();
                
                
            }
            
        }

    }

    public function render()
    {
        $worksheets = Worksheet::where([['employee_id', $this->employee],['available_hours','>',0]])->whereYear('day', $this->year)->whereMonth('day', $this->month)->get();
        foreach($worksheets as $key => $value){
            $this->timesheets[$key]['day'] = $value['day'];
        }
        
        return view('livewire.timesheet', compact('worksheets'));
    }

}
