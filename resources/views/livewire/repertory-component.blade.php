<div class=" w-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <form>   
        @livewire('components.search-bar', [
                'title' => __('Search'),
                'placeholder' => __('Ingresa nombre o acorde'),
                'componentName' => 'songs-list'
            ], 
            key('search-bar')
        )
        @livewire('songs-list', key('songs-list'))
    </form>
</div>