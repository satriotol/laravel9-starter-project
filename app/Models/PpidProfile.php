<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];
}
