@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-admin-panel::ref="span"
    x-admin-panel::on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-admin-panel::on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<x-admin-panel::dialog-modal wire:model.live="confirmingPassword">
    <x-admin-panel::slot name="title">
        {{ $title }}
    </x-admin-panel::slot>

    <x-admin-panel::slot name="content">
        {{ $content }}

        <div class="mt-4" x-data="{}" x-admin-panel::on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <x-admin-panel::input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" autocomplete="current-password"
                        x-admin-panel::ref="confirmable_password"
                        wire:model="confirmablePassword"
                        wire:keydown.enter="confirmPassword" />

            <x-admin-panel::input-error for="confirmable_password" class="mt-2" />
        </div>
    </x-admin-panel::slot>

    <x-admin-panel::slot name="footer">
        <x-admin-panel::secondary-button wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-admin-panel::secondary-button>

        <x-admin-panel::button class="ms-3" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
            {{ $button }}
        </x-admin-panel::button>
    </x-admin-panel::slot>
</x-admin-panel::dialog-modal>
@endonce
