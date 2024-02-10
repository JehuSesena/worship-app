<?php

namespace App\Http\Livewire;

use App\Models\Playlist;
use App\Models\Song;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class SongsList extends Component
{
    public array $imagesInfo;
    public array $selectedSongs;

    protected $listeners = [
        'searchSongInDatabase',
        'songRemovedFromPlaylist',
    ];

    public function render()
    {
        return view('livewire.songs-list');
    }

    public function songRemovedFromPlaylist($id)
    {
        $this->selectedSongs = array_diff($this->selectedSongs, [$id]);
    }

    private function songAddedToPlaylist($id)
    {
        $this->selectedSongs[] = $id;
    }

    private function giveMeSongs()
    {
        $this->emit('create-play-list', 'giveMeSongs');
    }

    public function mount()
    {
        // $this->getSomeImages();
        $this->selectedSongs = [];
        // $this->giveMeSongs();
    }

    private function getSomeImages()
    {
        $files = Song::select('file_path', 'title', 'starts_with')->limit(6)->get();

        foreach ($files as $file) {
            $fileName = str_replace('songs/', '', $file->file_path);
            $this->imagesInfo[] = [
                'id' => $file->id,
                'fileName' => $fileName,
                'songName' => $file->title,
                'firstParagraph' => $file->starts_with,
            ];
        }
    }

    public function searchSongInDatabase($search)
    {
        $search = '%' . $search . '%';
        $songs = Song::where('title', 'like', $search)
        ->orWhere('starts_with', 'like', $search)
        ->get();

        $this->imagesInfo = [];

        foreach ($songs as $song) {
            $fileName = str_replace('songs/', '', $song->file_path);
            $this->imagesInfo[] = [
                'id' => $song->id,
                'fileName' => $fileName,
                'songName' => $song->title,
                'firstParagraph' => $song->starts_with,
            ];
        }
    }

    public function selectSong($id)
    {
        $this->emitTo('create-play-list', 'addSongToPlaylist', $id);
        $this->songAddedToPlaylist($id);
    }
}
