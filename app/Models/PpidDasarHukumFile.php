<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PpidDasarHukumFile extends Model
{
    use HasFactory;
    protected $fillable = ['ppid_dasar_hukum_id','name','file'];

    public function PPIDDasarHukums()
    {
        return $this->belongsTo(PPIDDasarHukum::class, 'ppid_dasar_hukum_id', 'id');
        //return $this->hasMany(PPIDDasarHukum::class, 'ppid_dasar_hukum_id', 'id');
    }
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['file']);
    }
}
