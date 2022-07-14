<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditEmployeeRequest;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Timesheet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all()->sortBy('last_name');

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        Employee::firstOrCreate($request->only('last_name'));
        return redirect()->route('employees.index')->with('message', 'Employee created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.index')
                        ->with('message', 'Employee '.$employee->last_name.' updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    *
    *
    */
    public function timesheectListing(Employee $employee){
        
        $timesheets = Timesheet::with('project')->where('employee_id', $employee->id)->get();
        //dd($timesheets);
        $results = $timesheets->groupBy(['project.name', function($timesheet){
            $date = Carbon::createFromFormat('Y-m-d', $timesheet->day); 
            return $date->year.'-'.$date->month;
        }])->all();
        
        return view('employees.timesheets', compact('employee', 'results'));

    }
}
