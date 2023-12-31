<x-app-layout>
    <x-slot name="title">
        {{ __('Emad Edeen') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Emad Edeen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('emad-edeen.list-schema')
            </div>
        </div>
    </div>
</x-app-layout>
