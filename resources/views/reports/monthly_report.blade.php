<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style>
        @page { 
            margin: 30 0 30;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="float-right">
                <img class="thumbnail pull-right" style="width:100px" src="https://www.top-ix.org/wp-content/uploads/2019/11/05_Main-logo-e1575451686280.png">
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row" style="margin-left: 10px ;">
            <p class="h4 text-center">
                Monthly Timesheet
            </p>
        </div>
        <div class="row" style="margin-left: 10px ;">
            <strong>Project Details</strong>
            <ul class="list-unstyled">
                <li>Project Name:&nbsp;{{$project->name}}</li>
                <li>Project ID:&nbsp;{{$project->code}}</li>
            </ul>
        </div>
        <div class="row" style="margin-left: 10px ;">
            <strong>Manager Details</strong>
            <p>Last Name:&nbsp;{{$project->manager_last_name}}</p>
        </div>
        <div class="row" style="margin-left: 10px ;">
            <strong>Employee Details</strong>
            <p>Last Name {{$employee->last_name}}</p>
        </div>

    
    <p><strong>Reporting Period</strong> {{\Carbon\Carbon::create()->day(1)->month($month)->format('M')}} {{ $year }}</p>
  
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <th>Presence Hours</th>
            <th>Project Hours</th>
            <th>Notes</th>
        </tr>
        @foreach($period as $date)
        <tr>
            <td>{{ $date->format('d-m-Y') }}</td>
            @if (isset($worksheet_as_dict[$date->format('Y-m-d')]))
                <td>{{$worksheet_as_dict[$date->format('Y-m-d')]->worked_hours}}</td>    
            @else
                <td>-</td>    
            @endif
            @if (isset($timesheet_as_dict[$date->format('Y-m-d')]))
                <td>{{$worksheet_as_dict[$date->format('Y-m-d')]->worked_hours}}</td>    
                @if (isset($worksheet_as_dict[$date->format('Y-m-d')]->notes))
                    <td>{{$worksheet_as_dict[$date->format('Y-m-d')]->notes}}</td>    
                @else
                    <td>-</td>
                @endif
            @else
                <td>-</td>    
                <td>-</td>    
            @endif
            
        </tr>
        @endforeach
    </table>
    <br>
    <br>
    <div class="row" style="margin-left: 10px ;">
            
            <p><strong>Total Presence Hours</strong> {{$total_presence}}</p>
    </div>
    <div class="row" style="margin-left: 10px ;">
        
        <p><strong>Total Project Hours</strong> {{$total_on_project}}</p>
    </div>
    <div class="row float-right" style="margin-left: 10px ;">
        <div class="float-right">
            <label>Supervisor signature</label>
            <hr>
        </div>
    </div>
    <div class="row" style="margin-left: 10px ;">
        <div class="float-right">
            <label>Employee signature</label>
            <hr>
        </div>
    </div>
</div>
    
    
  
</body>
</html>