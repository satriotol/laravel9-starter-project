<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidInfopublicFile extends Model
{
    use HasFactory;
    protected $fillable = ['ppid_infopublic_id', 'name', 'file'];

    public function PpidInfopublicFiles()
    {
        return $this->belongsTo(PpidInfopublic::class, 'ppid_infopublic_id', 'id');
    }
}
