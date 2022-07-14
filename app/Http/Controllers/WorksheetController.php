<?php

namespace App\Http\Controllers;

use App\Exports\WorksheetExport;
use App\Http\Requests\CreateWorksheetRequest;
use App\Imports\WorksheetsImport;
use App\Models\Worksheet;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;

class WorksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $worksheets = Worksheet::with('employee')->paginate();

        return view('worksheets.index', compact('worksheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worksheets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorksheetRequest $request)
    {
        Excel::import(new WorksheetsImport, $request->file('worksheet')->store('temp'));
        return redirect()->route('worksheets.index')->with('message', 'Worksheet loaded!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
     */
    public function worksheet_csv()
    {
        return Excel::download(new WorksheetExport, 'worksheets.csv');

    }
}
