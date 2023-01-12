<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebijakanCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function kebijakans()
    {
        return $this->hasMany(Kebijakan::class, 'kebijakan_category_id', 'id');
    }
}
