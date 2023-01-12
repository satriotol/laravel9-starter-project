<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidLayananInformasi extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'link', 'description', 'icon', 'type'];

    const TYPELINK = 'Link';
    const TYPEIMAGE = 'Gambar';
    const TYPEDETAIL = 'Detail';
    const TYPES = [
        self::TYPELINK, self::TYPEIMAGE, self::TYPEDETAIL
    ];

    public function ppid_layanan_informasi_details()
    {
        return $this->hasMany(PpidLayananInformasiDetail::class, 'ppid_layanan_informasi_id', 'id');
    }
    public static function getFrontenddata($paramaters = Null)
    {
        if ($paramaters != '') {
            $ppidLayananInformasis = PpidLayananInformasi::where('name', 'LIKE', "%{$paramaters}%")->paginate(5);
        } else {
            $ppidLayananInformasis = PpidLayananInformasi::orderBy("id", "desc")->get();
        }
        return $ppidLayananInformasis;
    }
}
