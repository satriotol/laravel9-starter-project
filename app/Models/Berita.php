<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'verified_by', 'short_description', 'berita_category_id', 'berita_subcategory_id', 'title', 'description', 'image', 'is_verified'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by', 'id');
    }
    public function berita_category()
    {
        return $this->belongsTo(BeritaCategory::class, 'berita_category_id', 'id');
    }
    public function berita_subcategory()
    {
        return $this->belongsTo(BeritaSubcategory::class, 'berita_subcategory_id', 'id');
    }
    public function berita_galleries()
    {
        return $this->hasMany(BeritaGallery::class, 'berita_id', 'id');
    }
    public function berita_files()
    {
        return $this->hasMany(BeritaFile::class, 'berita_id', 'id');
    }
    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['image']);
    }
    public static function getBeritaAll($request)
    {
        $is_verified = $request->is_verified;
        $title = $request->title;
        $berita = Berita::query();
        if ($is_verified == 'null') {
            $berita->where('is_verified', null);
        } else if ($is_verified) {
            $berita->where('is_verified', $is_verified);
        }
        if ($title) {
            $berita->where('title', 'LIKE', '%' . $title . '%');
        }
        return $berita->orderBy('id', 'desc')->paginate();
    }
    public static function getVerifiedBeritas()
    {
        return Berita::where('is_verified', 1)->orderBy('id', 'desc');
    }
    public static function getBeritas($paginate, $is_kegiatan, $berita_category_id, $request)
    {
        $berita = Berita::getVerifiedBeritas();
        $title = $request->title;
        if ($title) {
            $berita->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($berita_category_id != '') {
            $berita->where('berita_category_id', $berita_category_id);
        }

        if ($is_kegiatan == 1) {
            $berita->whereHas('berita_category', function ($q) {
                $q->where('is_kegiatan', 1);
            });
        } elseif ($is_kegiatan == null) {
            $berita->whereHas('berita_category', function ($q) {
                $q->where('is_kegiatan', null);
            });
        } else {
            return $berita->paginate($paginate);
        }
        return $berita->paginate($paginate)->withQueryString();
    }
    public static function getLatestBeritas($paginate, $is_kegiatan, $berita_category_id)
    {
        $berita = Berita::getVerifiedBeritas();
        if ($berita_category_id != '') {
            $berita->where('berita_category_id', $berita_category_id);
        }

        if ($is_kegiatan == 1) {
            $berita->whereHas('berita_category', function ($q) {
                $q->where('is_kegiatan', 1);
            });
        } elseif ($is_kegiatan == null) {
            $berita->whereHas('berita_category', function ($q) {
                $q->where('is_kegiatan', null);
            });
        } else {
            return $berita->paginate($paginate);
        }
        return $berita->paginate($paginate);
    }
    public function getVerificationStatus()
    {
        if ($this->is_verified == 1) {
            return 'TERVERIFIKASI';
        } else {
            return 'BELUM';
        }
    }
}
