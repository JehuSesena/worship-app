<div class=" w-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Título') }}</label>
                <input type="text" id="title" wire:model="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="{{ __('Ejemplo') }}: Eres todopoderoso">
                @error('title')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="starts_with"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Frase inicial') }}</label>
                <input type="text" id="starts_with" wire:model="starts_with"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="{{ __('Ejemplo') }}: La única razón">
                @error('starts_with')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="initial_chord"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Acorde inicial') }}</label>
                <input type="text" id="initial_chord" wire:model="initial_chord"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="{{ __('Ejemplo') }}: Bm">
                @error('initial_chord')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="real_chord"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Acorde real') }}</label>
                <input type="text" id="real_chord" wire:model="real_chord"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="{{ __('Ejemplo') }}: D">
                @error('real_chord')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            @unless ($image)
                <div>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">{{ __('Click para subir') }}</span>
                                    {{ __('o arrastra y suelta') }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('Imagen') }}</p>
                            </div>
                            <input id="dropzone-file" type="file" wire:model="image" class="hidden" accept="image/*" />
                        </label>
                    </div>
                    @error('image')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            @endunless

            @if ($image)
                <div class=" flex justify-center">
                    <img class="h-64 max-w-max rounded-lg" src="{{ $image->temporaryUrl() }}" alt="{{ __('Himno') }}">
                </div>
            @endif

        </div>

        <div class="flex justify-center">
            <x-livewire-button text="{{ __('Subir canto') }}" methodName="uploadSong"/>
        </div>
    </div>
</div>
