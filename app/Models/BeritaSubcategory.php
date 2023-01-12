<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class BeritaSubcategory extends Model
{
    use HasFactory;
    protected $fillable= ['berita_category_id', 'name', 'image'];

    public Function berita_category()
    {
        return $this->belongsTo(BeritaCategory::class, 'berita_category_id', 'id');
    }
    public function beritas()
    {
        return $this->hasMany(Berita::class, 'berita_subcategory_id', 'id');
    }
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['image']);
    }

}
