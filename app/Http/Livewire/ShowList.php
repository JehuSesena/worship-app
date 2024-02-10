<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Playlist;
use App\Models\Song;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Log;

class ShowList extends Component
{

    public array $imagesInfo;
    public int $playlistId;
    public string $playlistName;

    public function render()
    {
        return view('livewire.show-list');
    }

    public function mount($playlistId)
    {
        $this->getPlaylistName($playlistId);
        $this->getImagesFromListId($playlistId);
    }

    private function getImagesFromListId($playlistId)
    {
        $this->playlistName = Playlist::find($playlistId)->name;
        $songsId = Playlist::find($playlistId)->songs()->pluck('song_id');
        $files = Song::select('file_path', 'title', 'starts_with')->whereIn('id', $songsId)->get();
        $imagesInfo = [];
        foreach ($files as $file) {
            $fileName = str_replace('songs/', '', $file->file_path);
            $imagesInfo[] = [
                'fileName' => $fileName,
                'songName' => $file->title,
                'firstParagraph' => $file->starts_with,
            ];
        }
        $this->imagesInfo = $imagesInfo;
    }

    private function getPlaylistName($playlistId)
    {
        $this->playlistName = Playlist::find($playlistId)->name;
    }

    public function createPDF()
    {
        try 
        {
            $pdf = PDF::loadView('view-pdf', ['imagesInfo' => $this->imagesInfo]);
            $nameNoSpaces = str_replace(' ', '_', $this->playlistName);

            if (!$pdf) 
            {
                throw new \Exception('PDF could not be generated.');
            }

            $pdf->save(storage_path('app/livewire-tmp/' . $nameNoSpaces . '.pdf'));

            return response()->download(storage_path('app/livewire-tmp/' . $nameNoSpaces . '.pdf'))->deleteFileAfterSend();
        } 
        catch (\Throwable $e) 
        {
            Log::error('Something went wrong while creating PDF: ' . $e->getMessage() . ' in file: ' . $e->getFile() . ' on line: ' . $e->getLine());
        }
    }
    
}
