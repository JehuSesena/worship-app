<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Collection;

class IndexList extends Component
{
    public Collection $playlists;

    public function render()
    {
        return view('livewire.index-list');
    }

    public function mount()
    {
        $this->playlists = $this->getPlaylists();
    }

    private function getPlaylists()
    {
        return Playlist::all();
    }

    public function deletePlaylist($id)
    {
        Playlist::destroy($id);
        $this->playlists = $this->getPlaylists();
    }
}
