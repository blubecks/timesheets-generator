<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Timesheet;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;


class TimesheetsImport implements ToCollection
{

    private function importEmployees(Collection $raw_employees): Collection{
        $employees = collect([null, null]);
    
        foreach($raw_employees as $index => $last_name){
            if ($index > 1){
                //skip two empty cells
                $employees->push(Employee::firstOrCreate(['last_name' => $last_name]));
            }
            
        }
        return $employees;
    }

    public function collection(Collection $rows)
    {   
        $employees = collect([]);
        foreach($rows as $index => $row){

            if($index == 0){
                //user import
                $employees = $this->importEmployees($row);
                
                Log::debug("user import");
                continue;
            }
            if($row[1] == 'O'){
                //Working day to import
                Log::debug($row[0]);
                foreach ($row as $index => $hours){
                    if ($index < 2) continue;
                    if ($hours){
                        Log::debug($employees[$index]);
                        Log::debug($hours);
                        $ts = new Timesheet();
                        $ts->day = Carbon::createFromFormat('d/m/y', $row[0]);
                        $ts->worked_hours = $hours;
                        $ts->employee()->associate($employees[$index]);
                        $ts->save();
                    }
                    
                }
            }

        }

    }
}
