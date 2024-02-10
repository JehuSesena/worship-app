<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ModalLivewire extends Component
{
    public string $title;
    public string $livewireComponent;
    public string $modalId;

    public function render()
    {
        return view('livewire.components.modal-livewire');
    }

    public function mount(string $title, string $livewireComponent) : void
    {
        $this->title = $title ?? 'Title';
        $this->livewireComponent = $livewireComponent ?? 'upload-song';
        $this->modalId = uniqid();
    }

    public function closeModal() : void
    {
        $this->emitUp('closeModal', $this->livewireComponent);
    }
}
