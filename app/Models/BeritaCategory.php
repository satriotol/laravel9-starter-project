<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BeritaCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'is_kegiatan', 'description', 'logo'];

    public function beritas()
    {
        return $this->hasMany(Berita::class, 'berita_category_id', 'id');
    }
    public function berita_subcategories()
    {
        return $this->hasMany(Berita::class, 'berita_category_id', 'id');
    }
    public function berita_category_galleries()
    {
        return $this->hasMany(BeritaCategoryGallery::class, 'berita_category_id', 'id');
    }
    public static function getBeritaCategories()
    {
        return BeritaCategory::where('is_kegiatan', null)->get();
    }
    public static function getKategoriCategories()
    {
        return BeritaCategory::where('is_kegiatan', 1)->get();
    }
    public function deleteFile()
    {
        if ($this->attributes['image'] != null) {
            Storage::disk('public_uploads')->delete($this->attributes['image']);
        }
    }
    public function deleteLogo()
    {
        if ($this->attributes['logo'] != null) {
            Storage::disk('public_uploads')->delete($this->attributes['logo']);
        }
    }
}
