<x-admin-panel::guest-layout>
    <x-admin-panel::authentication-card>
        <x-admin-panel::slot name="logo">
            <x-admin-panel::authentication-card-logo />
        </x-admin-panel::slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-admin-panel::validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-admin-panel::label for="password" value="{{ __('Password') }}" />
                <x-admin-panel::input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-admin-panel::button class="ms-4">
                    {{ __('Confirm') }}
                </x-admin-panel::button>
            </div>
        </form>
    </x-admin-panel::authentication-card>
</x-admin-panel::guest-layout>
