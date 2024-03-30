<x-admin-panel::app-layout>
    <x-admin-panel::slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-admin-panel::slot>

    <div class="py-12">
        <div class="max-admin-panel::w-7xl mx-admin-panel::auto sm:px-admin-panel::6 lg:px-admin-panel::8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-admin-panel::welcome />
            </div>
        </div>
    </div>
</x-admin-panel::app-layout>
