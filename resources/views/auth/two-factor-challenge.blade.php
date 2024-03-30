<x-admin-panel::guest-layout>
    <x-admin-panel::authentication-card>
        <x-admin-panel::slot name="logo">
            <x-admin-panel::authentication-card-logo />
        </x-admin-panel::slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-admin-panel::show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-admin-panel::cloak x-admin-panel::show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <x-admin-panel::validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-admin-panel::show="! recovery">
                    <x-admin-panel::label for="code" value="{{ __('Code') }}" />
                    <x-admin-panel::input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-admin-panel::ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-admin-panel::cloak x-admin-panel::show="recovery">
                    <x-admin-panel::label for="recovery_code" value="{{ __('Recovery Code') }}" />
                    <x-admin-panel::input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-admin-panel::ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                    x-admin-panel::show="! recovery"
                                    x-admin-panel::on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                    x-admin-panel::cloak
                                    x-admin-panel::show="recovery"
                                    x-admin-panel::on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <x-admin-panel::button class="ms-4">
                        {{ __('Log in') }}
                    </x-admin-panel::button>
                </div>
            </form>
        </div>
    </x-admin-panel::authentication-card>
</x-admin-panel::guest-layout>
