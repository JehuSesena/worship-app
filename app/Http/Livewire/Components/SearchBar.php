<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SearchBar extends Component
{
    public $title;
    public $search;
    public $placeholder;
    public $componentName;

    public function render()
    {
        return view('livewire.components.search-bar');
    }

    public function updatedSearch()
    {
        $this->emitTo($this->componentName, 'searchSongInDatabase', $this->search);
    }
}
