<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'description', 'link'];
    const TYPELINK = 'Link';
    const TYPEHALAMAN = 'Halaman';
    const TYPES = [
        self::TYPELINK, self::TYPEHALAMAN
    ];
}
