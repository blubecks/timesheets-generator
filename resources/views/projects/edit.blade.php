<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" :errors="$errors" />
                    <x-success-message class="mb-4" />
                    
                    <form method="POST" action="{{route('projects.update', $project)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="name" :value="__('Project Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $project->name }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label for="code" :value="__('Project Id')" />
                            <x-input id="code" class="block mt-1 w-full" type="text" name="code" value="{{ $project->code }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label for="manager_first_name" :value="__('Manager First Name')" />
                            <x-input id="manager_first_name" class="block mt-1 w-full" type="text" name="manager_first_name" value="{{ $project->manager_first_name }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label for="manager_last_name" :value="__('Manager Last Name')" />
                            <x-input id="manager_last_name" class="block mt-1 w-full" type="text" name="manager_last_name" value="{{ $project->manager_last_name }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label for="start" :value="__('Starting Date')" />
                            <x-input id="start" class="block mt-1 w-full" type="date" name="start" value="{{ $project->start }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label  for="stop" :value="__('Deadline')" />
                            <x-input id="stop" class="block mt-1 w-full" type="date" name="stop" value="{{ $project->stop }}"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
