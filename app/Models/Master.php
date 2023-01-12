<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Master extends Model
{
    use HasFactory;
    protected $fillable = ['banner', 'background', 'logo', 'phone', 'email'];
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['banner']);
        Storage::disk('public_uploads')->delete($this->attributes['background']);
        Storage::disk('public_uploads')->delete($this->attributes['logo']);
    }
    public function deleteFileBackground()
    {
        Storage::disk('public_uploads')->delete($this->attributes['background']);
    }
    public function deleteFileBanner()
    {
        Storage::disk('public_uploads')->delete($this->attributes['banner']);
    }
    public function deleteFileLogo()
    {
        Storage::disk('public_uploads')->delete($this->attributes['logo']);
    }
}
