<div class="max-h-[600px] overflow-y-auto">
    @if ($imagesInfo)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($imagesInfo as $imageInfo)
        <button wire:click.prevent="selectSong('{{ $imageInfo['id'] }}')">
            @if (!in_array($imageInfo['id'], $selectedSongs))
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-3 hover:cursor-pointer">
                    <div class="flex justify-center mt-5">
                        <img class="w-max h-auto max-h-40 rounded-lg"
                            src="{{ route('song.show', ['filename' => $imageInfo['fileName']]) }}" alt="" />
                    </div>
                    <div class="p-5">
                        <a href="#" class="block text-center">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $imageInfo['songName'] }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                            {{ $imageInfo['firstParagraph'] }}</p>
                    </div> 
                </div>
                @else
                @php
                $index = array_search($imageInfo['id'], $selectedSongs);
                @endphp

                <div class="max-w-sm bg-white border border-green-500 rounded-lg shadow relative dark:bg-gray-800 dark:border-green-500 mt-3 hover:cursor-pointer">
                    <div class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center">
                        <span>{{ $index + 1 }}</span>
                    </div>
                    <div class="flex justify-center mt-5">
                        <img class="w-max h-auto max-h-40 rounded-lg"
                            src="{{ route('song.show', ['filename' => $imageInfo['fileName']]) }}" alt="" />
                    </div>
                    <div class="p-5">
                        <a href="#" class="block text-center">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $imageInfo['songName'] }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                            {{ $imageInfo['firstParagraph'] }}</p>
                    </div>
                </div>
                
                    @endif
        </button>
        @endforeach
    </div>
    @else
    <div class="text-center">
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <div class="mx-auto">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mx-auto" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">{{ __('Info') }}</span>
                <span class="font-medium">{{ __('Ingresa al menos una palabra para buscar en la base de datos')
                    }}</span>
            </div>
        </div>
    </div>

    @endif
</div>