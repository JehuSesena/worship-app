@if ($imagesInfo)
<div class="container mx-auto mt-14">
    <button wire:click="createPDF" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ __('Descargar PDF') }}</button>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($imagesInfo as $imageInfo)
            <div
                class="flex justify-center items-center w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-5">
                <div class="flex justify-center my-5 mx-2">
                    <img class="w-max h-auto max-h-64 rounded-lg"
                        src="{{ route('song.show', ['filename' => $imageInfo['fileName']]) }}" alt="" />
                </div>
                <div class="p-5">
                    <h5 class=" block text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $imageInfo['songName'] }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                        {{ $imageInfo['firstParagraph'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endif
