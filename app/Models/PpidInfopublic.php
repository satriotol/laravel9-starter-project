<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidInfopublic extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category', 'ppid_infopublic_subcategory_id'];


    public function PpidInfosubcategory()
    {
        return $this->belongsTo(PpidInfopublicSubcategory::class, 'ppid_infopublic_subcategory_id', 'id');
    }
    public function PpidInfopublicFiles()
    {
        return $this->hasMany(PpidInfopublicFile::class, 'ppid_infopublic_id', 'id');
    }
    public static function getFrontenddata($category)
    {
        $ppidInfoPublics = PpidInfopublic::where('category', $category)->orderBy("id", "desc");
        return $ppidInfoPublics;
    }
}
