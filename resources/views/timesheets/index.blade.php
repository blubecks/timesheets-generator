<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timesheets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <x-success-message class="mb-4" />
                                
                                <div class="flex justify-end mb-4">
                                    <a class="bg-green-500 border-green-500 text-white btn border-primary border-2" href="{{ route('timesheets.create') }}">Create a Timesheet</a>
                                </div>
                                
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    @foreach ($timesheets as $project => $timesheet )    
                                    <div class="accordion" >
                                        <div class="accordion-item bg-white border border-gray-200">
                                            <h2 class="accordion-header mb-0" id="heading{{$project}}">
                                                <button class="
                                                    accordion-button
                                                    relative
                                                    flex
                                                    items-center
                                                    w-full
                                                    py-4
                                                    px-5
                                                    text-base text-gray-800 text-left
                                                    bg-white
                                                    border-0
                                                    rounded-none
                                                    transition
                                                    focus:outline-none
                                                " type="button" data-bs-toggle="collapse" data-bs-target="#{{$project}}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    {{$project}}
                                                </button>
                                            </h2>
                                            <div id="{{$project}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$project}}"
                                            data-bs-parent="#example">
                                                <div class="accordion-body py-4 px-5">
                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    {{__('Employee')}}
                                                                </th>
                                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    {{__('Worked Hours per Project')}}
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody  class="bg-white divide-y divide-gray-200">
                                                        @foreach ($timesheet as $employee => $worked_hours )
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    <strong>{{$employee}}</strong>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    {{$worked_hours}}
                                                                </td>
                                                            </tr>    
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
