<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div>
        <x-label class="mb-4" for="employee" :value="__('Select an Employee')" />
        <select wire:model="employee" id="employee" class="block mt-1 w-full" name="employee">
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->last_name}}</option>
            @endforeach 
        </select>
    </div>
    <div class="mt-4">
        <x-label class="mb-4" for="employee" :value="__('Select a Project')" />
        <select wire:model="project" id="project" class="block mt-1 w-full" name="project">
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name}}</option>
            @endforeach 
        </select>
    </div>
    <div class="mt-4">
    <ul>
        @foreach($worksheets as $worksheet)
            <li>{{ $worksheet->day }} - {{ $worksheet->worked_hours }}</li>
        @endforeach
    </ul>
    </div>
</div>
