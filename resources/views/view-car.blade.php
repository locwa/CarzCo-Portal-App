<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Car') }}
        </h2>
        <div class="flex gap-4">
            <a href="./edit-car/{{ $car_details->value('id') }}">
                <x-secondary-button>{{ $car_details->value('status') ? "Make Available" : "Make Unavailable" }}</x-secondary-button>
            </a>
            <a href="../edit-car/{{ $car_details->value('id') }}">
                <x-primary-button>Edit Car</x-primary-button>
            </a>
            <a href="./delete-car/{{ $car_details->value('id') }}">
                <x-danger-button>Delete Car</x-danger-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Header -->
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-xl">{{ $car_details->value('make') }}</h3>
                            <h1 class="text-4xl font-bold"> {{ $car_details->value('model') }}</h1>
                            <h4 class="text-lg">{{ $car_details->value('year') }}</h4>
                        </div>
                        <div>
                            <h4 class="text-lg">ID: {{ $car_details->value('id') }}</h4>
                            <h4 class="text-lg">Status: {{ $car_details->value('status') ? "Unavailable" : "Available" }}</h4>
                        </div>
                        </div>
                    </div>

                    <hr>

                    <p class="m-6 text-gray-900 dark:text-gray-100 whitespace-pre-wrap">{!! $car_details->value('description') !!}</p>
            </div>
        </div>
    </div>
</x-app-layout>
