<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Accounts') }}
        </h2>
        <a href="./register">
            <x-primary-button>
                Add Employee Account
            </x-primary-button>
        </a>
    </x-slot>

    <div class="py-12 px-2">
        @foreach($accounts as $employee)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center justify-between">

                <div class="text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-4">{{ $employee->name }}</h2>
                    <p class="font-light text-sm text-gray-800 dark:text-gray-200 leading-tight mb-1">{{ $employee->email }}</p>
                    <p class="font-light text-sm text-gray-800 dark:text-gray-200 leading-tight">{{ $employee->is_admin ? "Admin" : "User" }}</p>
                </div>

                <a href="./view-profile/{{ $employee->id }}">
                    <x-primary-button>View Profile</x-primary-button>
                </a>

            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
