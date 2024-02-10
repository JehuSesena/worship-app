<div>
    @if ($playlists)
        @foreach ($playlists as $playlist)
            <a href="{{ route('playlist.show', $playlist->id) }}">
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                    role="alert">
                    <div>
                        {{ $playlist->name }}
                    </div>
                    <button type="button" wire:click="deletePlaylist('{{ $playlist->id }}')" class="ml-auto text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">X</button>
                </div>
            </a>
        @endforeach
    @endif
</div>
