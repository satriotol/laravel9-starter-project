<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TemporaryFile extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['filename']);
    }
}
