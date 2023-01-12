<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaCategoryGallery extends Model
{
    use HasFactory;

    protected $fillable = ['berita_category_id', 'image'];

    public function berita_category()
    {
        return $this->belongsTo(BeritaCategory::class, 'berita_category_id', 'id');
    }
}
