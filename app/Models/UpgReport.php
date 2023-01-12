<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UpgReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'upg_category_id', 'user_id', 'name', 'address', 'jabatan', 'instansi', 'phone', 'hubungan_dengan_pemberi', 'datetime_gratifikasi', 'address_gratifikasi', 'uraian_jenis_gratifikasi', 'nilai_gratifikasi', 'alasan_pemberian', 'kronologi_pemberian', 'file', 'status', 'response'
    ];
    const STATUSPENDING = 'Pending';
    const STATUSSELESAI = 'Selesai';
    const STATUSDITOLAK = 'Ditolak';
    const STATUSES = [self::STATUSPENDING, self::STATUSSELESAI, self::STATUSDITOLAK];
    public function upg_category()
    {
        return $this->belongsTo(UpgCategory::class, 'upg_category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public static function getTotal()
    {
        $data = UpgReport::getData()->get()->count();
        return $data;
    }
    public function getStatus()
    {
        if ($this->status == self::STATUSPENDING) {
            $data = [
                'name' => self::STATUSPENDING,
                'color' => 'warning',
            ];
        } else if ($this->status == self::STATUSSELESAI) {
            $data = [
                'name' => self::STATUSSELESAI,
                'color' => 'success',
            ];
        } else {
            $data = [
                'name' => 'Ditolak',
                'color' => 'danger',
            ];
        }
        return $data;
    }
    public static function getData()
    {
        if (Auth::user()->user_detail) {
            $upgReports = UpgReport::where('user_id', Auth::user()->id);
        } else {
            $upgReports = UpgReport::query();
        }
        return $upgReports;
    }
    public static function getStatusCount()
    {
        $dataPending = UpgReport::getData()->where('status', self::STATUSPENDING)->get()->count();
        $dataSelesai = UpgReport::getData()->where('status', self::STATUSSELESAI)->get()->count();
        $dataDitolak = UpgReport::getData()->where('status', self::STATUSDITOLAK)->get()->count();

        return [
            self::STATUSPENDING => $dataPending,
            self::STATUSSELESAI => $dataSelesai,
            self::STATUSDITOLAK => $dataDitolak,
        ];
    }
}
