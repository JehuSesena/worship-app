<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Song;

class UploadSong extends Component
{
    use WithFileUploads;

    public $title;
    public $starts_with;
    public $initial_chord;
    public $real_chord;

    public $image;

    protected $rules = [
        'title' => 'required',
        'starts_with' => 'required',
        'initial_chord' => 'required',
        'real_chord' => 'required',
        'image' => 'image|max:2048', // 2MB Max
    ];

    public function render()
    {
        return view('livewire.upload-song');
    }

    public function uploadSong()
    {
        $this->validate();
        
        $filePath = $this->image->store('songs');

        Song::create([
            'title' => $this->title,
            'starts_with' => $this->starts_with,
            'initial_chord' => $this->initial_chord,
            'real_chord' => $this->real_chord,
            'file_path' => $filePath,
        ]);

        $id = Song::where('title', $this->title)->first()->id;
        $this->emitUp('songUploaded', $id); // Emit an event to the parent component (Dashboard

        $this->reset([
            'title',
            'starts_with',
            'initial_chord',
            'real_chord',
            'image'
        ]);

        $this->emit('closeModal', 'upload-song'); // Close the modal
    }
}
