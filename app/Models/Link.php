<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'image', 'description', 'whatsapp_url', 'short_description', 'google_form_url', 'is_pengaduan', 'is_layanan_utama', 'is_terkait', 'pengaduan_link'];

    public function deleteFile()
    {
        Storage::disk('public_uploads')->delete($this->attributes['image']);
    }

    public static function getTerkaitLink()
    {
        return Link::where('is_terkait', 1)->get();
    }

    public static function getLayananUtamaLink()
    {
        return Link::where('is_layanan_utama', 1)->get();
    }

    public static function getPengaduanLink()
    {
        return Link::where('is_pengaduan', 1)->get();
    }
    public static function getWhatsappLink()
    {
        return Link::whereNotNull('whatsapp_url')->get();
    }
}
