<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fleet') }}
        </h2>
        <x-primary-button>
            Add Car
        </x-primary-button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
            @foreach($fleet_list as $list)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-80 h-64">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="font-light">{{ $list->make }}</p>
                        <h1 class="font-bold text-4xl">{{ $list->model }}</h1>
                        <p class="font-light">{{ $list->year }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
