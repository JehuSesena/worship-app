<div id="{{ $modalId }}" wire:ignore.self class="fixed inset-0 flex items-center justify-center z-50 overflow-auto bg-black bg-opacity-50 backdrop-blur-lg">
    <div class="modal-container bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white w-10/12 md:w-8/12 xl:w-6/12 mx-auto rounded shadow-lg z-50">
        <div class="modal-header bg-gray-200 dark:bg-gray-800 py-4 px-5 flex justify-between items-center">
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            <button type="button" wire:click="closeModal('{{ $livewireComponent }}')" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">X</button>
        </div>
        <div class="modal-body">
            @livewire($livewireComponent, ['key' => $modalId . '-' . $livewireComponent])
        </div>
    </div>
</div>
