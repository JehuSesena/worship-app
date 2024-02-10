<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Playlist;
use App\Models\Song;

class CreatePlayList extends Component
{
    public string $name;
    public bool $showModalUploadSong;
    public bool $showModalAddExistingSong;
    public array $selectedSongs = [];

    protected $listeners = [
        'closeModal',
        'songUploaded',
        'addSongToPlaylist',
        'deleteSongFromPlaylist',
        'requestSongs'
    ];

    public function requestSongs()
    {
        dd('requestSongs');
        $this->emitTo('songs-list', 'sentSongs', $this->selectedSongs);
    }

    public function mount()
    {
        $this->name = '';
        $this->showModalUploadSong = false;
        $this->showModalAddExistingSong = false;
    }

    public function songUploaded($id)
    {
        $songData = Song::find($id);
        $this->selectedSongs[] = [
            'id' => $id, 
            'title' => $songData->title
        ];
    }

    public function closeModal($componentName)
    {
        if ($componentName == 'upload-song') {
            $this->showModalUploadSong = false;
        }
        if ($componentName == 'repertory-component') {
            $this->showModalAddExistingSong = false;
        }
    }

    public function showModalUploadSong()
    {
        $this->showModalUploadSong = true;
    }

    public function showModalAddExistingSong()
    {
        $this->showModalAddExistingSong = true;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
        ]);

        if (count($this->selectedSongs) == 0) 
        {
            $this->addError('selectedSongs', __('Debes seleccionar al menos un himno.'));
            return;
        }

        Playlist::create([
            'name' => $this->name
        ]);

        $playlistId = Playlist::where('name', $this->name)->first()->id;

        $songsData = Song::whereIn('id', $this->getSongsId())->get();

        foreach ($songsData as $songData) 
        {
            $songData->playlists()->attach($playlistId);
        }

        $this->reset([
            'selectedSongs'
        ]);
    }

    private function getSongsId()
    {
        $songsId = [];
        foreach ($this->selectedSongs as $song) 
        {
            $songsId[] = $song['id'];
        }
        return $songsId;
    }

    public function deleteSongFromPlaylist($id)
    {
        $this->selectedSongs = array_filter($this->selectedSongs, function($song) use ($id) {
            return $song['id'] != $id;
        });

        $this->emitTo('songs-list', 'songRemovedFromPlaylist', $id);
        return;
    }

    public function addSongToPlaylist($id)
    {
        if (in_array($id, $this->getSongsId())) 
        {
            $this->deleteSongFromPlaylist($id);
        }

        $songData = Song::find($id);
        $this->selectedSongs[] = [
            'id' => $id, 
            'title' => $songData->title
        ];

        $this->emitTo('songs-list', 'songAddedToPlaylist', $id);
    }

    public function render()
    {
        return view('livewire.create-play-list');
    }
}
