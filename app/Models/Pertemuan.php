<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pertemuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'opd_id',
        'konsultasi_asistensi_category_id',
        'waktu_pertemuan',
        'description_permasalahan',
        'file',
        'description_file',
        'response',
        'response_file',
        'status',
    ];
    const STATUSPENDING = 'Pending';
    const STATUSDITERIMA = 'Diterima';
    const STATUSDITOLAK = 'Ditolak';
    const STATUSES = [self::STATUSPENDING, self::STATUSDITERIMA, self::STATUSDITOLAK];
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
    public static function getData()
    {
        if (Auth::user()->user_detail) {
            $pertemuans = Pertemuan::where('user_id', Auth::user()->id);
        } else {
            $pertemuans = Pertemuan::query();
        }
        return $pertemuans;
    }
    public function getResponse()
    {
        return $this->response ?? 'Belum Ada Response';
    }
    public function getStatus()
    {
        if ($this->status == self::STATUSPENDING) {
            $data = [
                'name' => 'Pending',
                'color' => 'warning',
            ];
        } else if ($this->status == self::STATUSDITERIMA) {
            $data = [
                'name' => 'Diterima',
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
        $data = Pertemuan::getData()->get()->count();
        return $data;
    }
    public static function getStatusCount()
    {
        $dataPending = Pertemuan::getData()->where('status', self::STATUSPENDING)->get()->count();
        $dataTerima = Pertemuan::getData()->where('status', self::STATUSDITERIMA)->get()->count();
        $dataDitolak = Pertemuan::getData()->where('status', self::STATUSDITOLAK)->get()->count();

        return [
            self::STATUSPENDING => $dataPending,
            self::STATUSDITERIMA => $dataTerima,
            self::STATUSDITOLAK => $dataDitolak,
        ];
    }
}
