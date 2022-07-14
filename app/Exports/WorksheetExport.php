<?php

namespace App\Exports;

use App\Models\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WorksheetExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Worksheet::all();

    }
    public function map($worksheet): array
    {
        return [
            $worksheet->day,
            $worksheet->employee->last_name,
            $worksheet->worked_hours
        ];
    }

    public function headings(): array
    {
        return ["day", "employee", "worked_hours"];
    }
}
