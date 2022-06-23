<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
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
                                    <a class="bg-green-500 border-green-500 text-white btn border-primary border-2" href="{{ route('employees.create') }}">{{__('Add an Employee')}}</a>
                                </div>
                                
                                <div class="grid grid-cols-4 gap-4">
                                    @foreach ($employees as $employee)
                                        <div class="bg-gray-100 rounded overflow-hidden shadow-md p-4">
                                            <img src="https://scalingupnutrition.org/wp-content/uploads/2020/10/user-placeholder.png">
                                            <div class="mt-4">
                                                <span class="font-bold"> {{ $employee->last_name }}</span>
                                            </div>
                                            <div class="flex items-center justify-end mt-4">
                                            <a href="{{ route('employees.edit', $employee) }}" class="btn bg-green-500 text-white ml-4">
                                                {{ __('Edit') }}
                                            </a>
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
