<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebijakanTema extends Model
{
    use HasFactory;

    protected $fillable = ['kebijakan_id', 'tema_id'];

    public function kebijakan()
    {
        return $this->belongsTo(Kebijakan::class, 'kebijakan_id', 'id');
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id', 'id');
    }
}
