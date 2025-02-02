<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fleet') }}
        </h2>
        <a href="./add_car">
            <x-primary-button>Add Car</x-primary-button>
        </a>
    </x-slot>

    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap justify-center gap-4">
            @foreach($fleet_list as $list)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/3 h-96">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="flex justify-between items-center">

                            <div class="w-2/3">
                                <p class="font-light text-xl">{{ $list->make }}</p>
                                <h1 class="font-bold text-4xl">{{ $list->model }}</h1>
                                <p class="font-light">{{ $list->year }}</p>
                            </div>

                            <div class="w-1/3 text-right">
                                <p class="font-light text-sm">ID: {{ $list->id }}</p>
                                <p class="font-light">Status: {{ $list->status ? "Unavailable" : "Available" }}</p>
                            </div>

                        </div>

                        <div class="flex gap-2">
                            <a href="./edit-car/{{ $list->id }}">
                                <x-primary-button class="my-3">{{ $list->status ? "Make Available" : "Make Unavailable" }}</x-primary-button>
                            </a>
                            @if(Auth::user()->is_admin)
                                <a href="./edit-car/{{ $list->id }}">
                                    <x-primary-button class="my-3">Edit Car</x-primary-button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
