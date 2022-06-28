<div>
    <div>
        <x-label class="mb-4" for="employee" :value="__('Select an Employee')" />
        <select wire:model="employee" id="employee" class="block mt-1 w-full" name="employee">
            <option >...</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->last_name}}</option>
            @endforeach 
        </select>
    </div>
    <div class="mt-6">
        <x-label class="mb-4" for="year" :value="__('Select Year')" />
        
        <select wire:model="year" id="month" class="block mt-1 w-full" name="year">
            <option >...</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            
        </select>
    </div>
    <div class="mt-6">
        <x-label class="mb-4" for="month" :value="__('Select Month')" />
        
        <select wire:model="month" id="month" class="block mt-1 w-full" name="month">
            <option >...</option>
            @foreach(range(1, \Carbon\Carbon::MONTHS_PER_YEAR) as $month)
                <option value="{{ $month }}">{{\Carbon\Carbon::create()->day(1)->month($month)->format('M')}}</option>
            @endforeach 
        </select>
    </div>
    <div class="mt-6">
        <x-label class="mb-4" for="employee" :value="__('Select a Project')" />
        
        <select wire:model="project" id="project" class="block mt-1 w-full" name="project">
            <option >...</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name}}</option>
            @endforeach 
        </select>
    </div>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-6">
        <form wire:submit.prevent="submit">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Date')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Available Hours')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Allocated Hours')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Notes')}}
                    </th>
        
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($worksheets as $key => $row)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <x-input id="day" wire:model="timesheets.{{ $key }}.day" type="date" disabled/>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $row->available_hours }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <x-input id="worked_hours" wire:model.lazy="timesheets.{{ $key }}.worked_hours" class="block mt-1 w-full" type="number"/>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <x-input id="notes" class="block mt-1 w-full" wire:model.lazy="timesheets.{{ $key }}.notes" type="text" />
                            </td>            
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
