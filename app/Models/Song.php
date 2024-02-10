<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'title',
        'starts_with',
        'initial_chord',
        'real_chord',
        'file_path'
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

}

 