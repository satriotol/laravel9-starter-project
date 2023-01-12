<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PPIDDasarHukum extends Model
{
    use HasFactory;
    protected $fillable = ['image','description'];

    public function PPIDDasarHukumFile()
    {
        return $this->hasMany(PpidDasarHukumFile::class, 'ppid_dasar_hukum_id', 'id');
       // return $this->belongsTo(PpidDasarHukumFile::class, 'ppid_dasar_hukum_id', 'id');
    }
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['image']);
    }

}
