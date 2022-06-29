<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Timesheet;
use App\Models\Worksheet;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF(Employee $employee, Project $project, $year, $month)
    {
        $timesheets = Timesheet::where([['employee_id', $employee->id],['project_id', $project->id]])->whereYear('day',$year)->whereMonth('day',$month)->get();
        $worksheets = Worksheet::where('employee_id', $employee->id)->whereYear('day',$year)->whereMonth('day',$month)->get();
        $timesheet_as_dict = [];
        $worksheet_as_dict = [];

        $daysInMonth = Carbon::now()->year($year)->month($month)->daysInMonth;
        $period = CarbonPeriod::create(Carbon::createFromDate($year, $month, 1), Carbon::createFromDate($year, $month, $daysInMonth))->toArray();
        $total_on_project = 0;
        $total_presence = 0;
        foreach ($timesheets as $key => $timesheet) {
            $timesheet_as_dict[$timesheet->day] = $timesheet;
            $total_on_project += $timesheet->worked_hours;
        }
        
        foreach ($worksheets as $key => $worksheet) {
            $worksheet_as_dict[$worksheet->day] = $worksheet;
            $total_presence += $worksheet->worked_hours;
        }


        $pdf = PDF::loadView('reports.monthly_report', compact('total_presence','total_on_project','timesheet_as_dict','worksheet_as_dict','project','employee','month','year', 'period'));
        
        return $pdf->download($employee->last_name.'_'.$year.'_'.$month.'.pdf');
    }
}
