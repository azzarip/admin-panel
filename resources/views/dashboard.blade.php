@props(['title' => request()->path() == '/' ? 'Dashboard' : ucwords(str_replace('-', ' ', request()->path()))])

<x-admin-panel::layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight px-2">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @yield('panel')
            </div>
        </div>
    </div>
</x-admin-panel::layouts.app>
