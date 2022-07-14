<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $employee->last_name }} {{ $employee->first_name }}
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
                                
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    @foreach ($results as $project => $period )    
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
                                                                    {{__('Time Reference')}}
                                                                </th>
                                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    {{__('Actions')}}
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody  class="bg-white divide-y divide-gray-200">
                                                        @foreach ($period as $year => $timesheet )
                                                        
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    <strong>{{$year}}</strong>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    @php
                                                                        $date = explode('-', $year);
                                                                        $year_str = $date[0];
                                                                        $month_str= $date[1];
                                                                    @endphp
                                                                <a href="{{ route('pdf.generate', [$employee, $timesheet[0]->project_id, $year_str, $month_str] ) }}" class="btn bg-green-500 text-white ml-4">
                                                                    {{ __('Download') }}
                                                                </a>
                                                                <a href="" class="btn bg-yellow-500 text-white ml-4">
                                                                    {{ __('Edit') }}
                                                                </a>
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
