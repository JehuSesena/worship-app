<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @component('components.redirect-route-button', ['routeName' => 'song.create', 'text' => __("Subir canto")]) @endcomponent
                    @component('components.redirect-route-button', ['routeName' => 'playlist.create', 'text' => __("Crear lista")]) @endcomponent
                    @livewire('index-list', key('index-list-component'))
                    {{-- @livewire('repertory-component', key('repertory-component')) --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
