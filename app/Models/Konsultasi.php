<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'waktu_pertemuan', 'konsultasi_asistensi_category_id', 'opd_id', 'description_permasalahan', 'file', 'description_file','response_file','response', 'status'];
    const STATUSPENDING = 'Pending';
    const STATUSDIJAWAB = 'Sudah Di Jawab';
    const STATUSDITOLAK = 'Ditolak';
    const STATUSES = [self::STATUSPENDING, self::STATUSDIJAWAB, self::STATUSDITOLAK];
    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opd_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function konsultasi_asistensi_category()
    {
        return $this->belongsTo(KonsultasiAsistensiCategory::class, 'konsultasi_asistensi_category_id', 'id');
    }
    public static function getTotal()
    {
        $data = Konsultasi::getData()->get()->count();
        return $data;
    }
    public static function getData()
    {
        if (Auth::user()->user_detail) {
            $konsultasis = Konsultasi::where('user_id', Auth::user()->id);
        } else {
            $konsultasis = Konsultasi::query();
        }
        return $konsultasis;
    }
    public function getResponse()
    {
        return $this->response ?? 'Belum Ada Response';
    }
    public static function getStatusCount()
    {
        $dataPending = Konsultasi::getData()->where('status', self::STATUSPENDING)->get()->count();
        $dataDijawab = Konsultasi::getData()->where('status', self::STATUSDIJAWAB)->get()->count();
        $dataDitolak = Konsultasi::getData()->where('status', self::STATUSDITOLAK)->get()->count();

        return [
            self::STATUSPENDING => $dataPending,
            self::STATUSDIJAWAB => $dataDijawab,
            self::STATUSDITOLAK => $dataDitolak,
        ];
    }
    public function getStatus()
    {
        if ($this->status == self::STATUSPENDING) {
            $data = [
                'name' => self::STATUSPENDING,
                'color' => 'warning',
            ];
        } else if ($this->status == self::STATUSDIJAWAB) {
            $data = [
                'name' => self::STATUSDIJAWAB,
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
}
