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
                    
                    <form method="POST" action="{{route('projects.store')}}"  enctype="multipart/form-data">
                        @csrf
                        
                        <div>
                            <x-label for="name" :value="__('Project Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label for="code" :value="__('Project Id')" />
                            <x-input id="code" class="block mt-1 w-full" type="text" name="code" value="{{ old('code') }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label for="start" :value="__('Starting Date')" />
                            <x-input id="start" class="block mt-1 w-full" type="date" name="start" value="{{ old('start') }}"/>
                        </div>
                        <div class="mt-4">
                            <x-label  for="stop" :value="__('Deadline')" />
                            <x-input id="stop" class="block mt-1 w-full" type="date" name="stop" value="{{ old('stop') }}"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
