<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebijakanStatus extends Model
{
    use HasFactory;
    protected $fillable = ['name','color'];

    public function kebijakans()
    {
        return $this->hasMany(Kebijakan::class, 'kebijakan_status_id', 'id');
    }
}
