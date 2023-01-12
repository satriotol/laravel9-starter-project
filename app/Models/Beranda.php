<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Beranda extends Model
{
    use HasFactory;
    protected $fillable = ['sambutan', 'thumbnail_video', 'video_url'];
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['thumbnail_video']);
    }
}
