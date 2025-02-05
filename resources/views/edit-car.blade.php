<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Car') }}
        </h2>
        <a href="../view-car/{{ $car_details->value('id') }}">
            <x-primary-button>Back to Car</x-primary-button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="post" action="../edit-car/{{ $car_details->value('id') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" enctype="multipart/form-data">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @csrf

                    <div class="mb-6">
                        <x-input-label>Make</x-input-label>
                        <x-text-input name='make' class="mt-1 block w-full" value="{{ $car_details->value('make') }}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Model</x-input-label>
                        <x-text-input name='model' class="mt-1 block w-full" value="{{ $car_details->value('model') }}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Year</x-input-label>
                        <x-text-input name='year' class="mt-1 block w-full" value="{{ $car_details->value('year') }}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Rent Price</x-input-label>
                        <x-text-input name='rent_price' class="mt-1 block w-full" value="{{ $car_details->value('rent_price') }}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Description</x-input-label>
                        <x-textarea>{{ $car_details->value('description') }}</x-textarea>
                    </div>

                    <div class="mb-6">
                        <x-image-input></x-image-input>
                    </div>

                    <x-primary-button>Edit</x-primary-button>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
