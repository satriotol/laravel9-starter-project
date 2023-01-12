<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PermohonanInformasi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'jenis_informasi', 'alasan_permohonan', 'response', 'status', 'response_file'];
    const STATUSPENDING = 'Pending';
    const STATUSSELESAI = 'Selesai';
    const STATUSDITOLAK = 'Ditolak';
    const STATUSES = [self::STATUSPENDING, self::STATUSSELESAI, self::STATUSDITOLAK];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public static function getData()
    {
        if (Auth::user()->user_detail) {
            $permohonanInformasis = PermohonanInformasi::where('user_id', Auth::user()->id);
        } else {
            $permohonanInformasis = PermohonanInformasi::query();
        }
        return $permohonanInformasis;
    }
    public function getResponse()
    {
        return $this->response ?? 'Belum Ada Response';
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

    public static function getTotal()
    {
        $data = PermohonanInformasi::getData()->get()->count();
        return $data;
    }
    public static function getStatusCount()
    {
        $dataPending = PermohonanInformasi::getData()->where('status', self::STATUSPENDING)->get()->count();
        $dataSelesai = PermohonanInformasi::getData()->where('status', self::STATUSSELESAI)->get()->count();
        $dataDitolak = PermohonanInformasi::getData()->where('status', self::STATUSDITOLAK)->get()->count();

        return [
            self::STATUSPENDING => $dataPending,
            self::STATUSSELESAI => $dataSelesai,
            self::STATUSDITOLAK => $dataDitolak,
        ];
    }
}
