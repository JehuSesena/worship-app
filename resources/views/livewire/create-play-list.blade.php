@component('components.view-layout')
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 mb-6">
            <label for="name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Nombre de la lista') }}</label>
            <input type="text" id="name" wire:model="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="{{ __('Ejemplo') }}: Lista #1">
            @error('name')
                <span class="text-red-500 text-xs italic mt-3">{{ $message }}</span>
            @enderror
            <div class="grid grid-cols-2 lg:grid-cols-3 mt-3">
                <button type="button" wire:click="showModalAddExistingSong"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    {{ __('Agregar himno existente a la lista') }}
                </button>
                <button type="button" wire:click="showModalUploadSong"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    {{ __('Subir himno y agregarlo a la lista') }}
                </button>
            </div>
            @if ($showModalUploadSong)
                @livewire(
                    'components.modal-livewire', [
                        'modalId' => 'modal-upload-song',
                        'title' => __('Subir himno'),
                        'livewireComponent' => 'upload-song',
                    ]
                )
            @elseif($showModalAddExistingSong)
                @livewire(
                    'components.modal-livewire', [
                        'modalId' => 'modal-add-existing-song',
                        'title' => __('Agregar himno existente'),
                        'livewireComponent' => 'repertory-component',
                    ]
                )
            @endif
            @if ($selectedSongs)
                @foreach ($selectedSongs as $song)
                <div class="flex mb-4">
                    <div class="flex sm:w-10/12 lg:w-11/12 w-8/12 items-center p-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                        <div>
                            {{ $song['title'] }}
                        </div>
                    </div>
                    <div class="flex sm:w-2/12 lg:w-1/12 w-4/12 justify-center">
                        <button type="button" wire:click="deleteSongFromPlaylist('{{ $song['id'] }}')" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">X</button>
                    </div>
                </div>
                
                @endforeach
            @endif
        </div>
        <div class="container mx-auto grid grid-rows-2 place-items-center">
            <x-submit-button text="{{ __('Crear lista') }}" />
            @error('selectedSongs')
                <div class=" flex justify-center items-center">
                    <span class="text-red-500 text-xs italic mt-3">{{ $message }}</span>
                </div>
            @enderror
        </div>
    </form>
@endcomponent
