<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidLayananInformasiDetail extends Model
{
    use HasFactory;

    protected $fillable = ['ppid_layanan_informasi_id', 'name', 'file'];

    public function ppid_layanan_informasi()
    {
        return $this->belongsTo(PpidLayananInformasi::class, 'ppid_layanan_informasi_id', 'id');
    }
}
