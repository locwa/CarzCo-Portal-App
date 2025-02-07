<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fleet') }}
        </h2>
        @if(Auth::user()->is_admin)
            <a href="./add_car">
                <x-primary-button>Add Car</x-primary-button>
            </a>
        @endif
    </x-slot>

    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap flex-col gap-4">
            @foreach($fleet_list as $list)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg h-80">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="flex justify-between items-center">

                            <div class="">
                                <p class="font-light text-xl">{{ $list->make }}</p>
                                <h1 class="font-bold text-4xl">{{ $list->model }}</h1>
                                <p class="font-light">{{ $list->year }}</p>
                            </div>

                            <div class=" text-right">
                                <p class="font-light text-sm"><span class="font-bold">ID</span>: {{ $list->id }}</p>
                                <p class="font-light"><span class="font-bold">Status:</span> {{ $list->status ? "Unavailable" : "Available" }}</p>
                                <p class="font-light"><span class="font-bold">Rent Price:</span> {{ numfmt_format_currency(numfmt_create('en_US', NumberFormatter::CURRENCY), $list->rent_price,"USD") }}</p>
                            </div>

                        </div>

                        <div class="flex gap-2 justify-end">
                            <a href="./fleet/edit-car-availability/{{ $list->id }}">
                                <x-secondary-button class="my-3">{{ $list->status ? "Make Available" : "Make Unavailable" }}</x-secondary-button>
                            </a>
                            <a href="./view-car/{{ $list->id }}">
                                <x-primary-button class="my-3">View Car</x-primary-button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
