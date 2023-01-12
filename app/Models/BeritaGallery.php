<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BeritaGallery extends Model
{
    use HasFactory;
    protected $fillable = ['berita_id', 'image'];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id', 'id');
    }
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['image']);
    }
}
