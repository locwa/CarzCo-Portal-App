<x-guest-layout>
    <x-slot:header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Account Deletion') }}
        </h2>
    </x-slot:header>
    <div class="flex flex-col justify-start">
        <form method="post" action="../profile-delete/{{ $id }}" class="px-6 py-2">
            @csrf
            @method('delete')

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once the account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
        <div class="px-6 flex justify-end">
            <a href="../employee-accounts">
                <x-secondary-button class="ms-3">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </a>
        </div>
    </div>
</x-guest-layout>



