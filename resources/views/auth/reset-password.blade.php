<x-admin-panel::guest-layout>
    <x-admin-panel::authentication-card>
        <x-admin-panel::slot name="logo">
            <x-admin-panel::authentication-card-logo />
        </x-admin-panel::slot>

        <x-admin-panel::validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-admin-panel::label for="email" value="{{ __('Email') }}" />
                <x-admin-panel::input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-admin-panel::label for="password" value="{{ __('Password') }}" />
                <x-admin-panel::input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-admin-panel::label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-admin-panel::input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-admin-panel::button>
                    {{ __('Reset Password') }}
                </x-admin-panel::button>
            </div>
        </form>
    </x-admin-panel::authentication-card>
</x-admin-panel::guest-layout>
