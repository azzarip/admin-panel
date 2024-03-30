<x-admin-panel::guest-layout>
    <x-admin-panel::authentication-card>
        <x-admin-panel::slot name="logo">
            <x-admin-panel::authentication-card-logo />
        </x-admin-panel::slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <x-admin-panel::validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-admin-panel::label for="email" value="{{ __('Email') }}" />
                <x-admin-panel::input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-admin-panel::button>
                    {{ __('Email Password Reset Link') }}
                </x-admin-panel::button>
            </div>
        </form>
    </x-admin-panel::authentication-card>
</x-admin-panel::guest-layout>
