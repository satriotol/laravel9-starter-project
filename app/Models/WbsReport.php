<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WbsReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'wbs_category_id', 'location', 'datetime','response_file', 'description', 'file', 'status', 'response'];
    const STATUSPENDING = 'Pending';
    const STATUSSELESAI = 'Selesai';
    const STATUSDITOLAK = 'Ditolak';
    const STATUSES = [self::STATUSPENDING, self::STATUSSELESAI, self::STATUSDITOLAK];

    public function wbs_category()
    {
        return $this->belongsTo(WbsCategory::class, 'wbs_category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public static function getData()
    {
        if (Auth::user()->user_detail) {
            $wbsReports = WbsReport::where('user_id', Auth::user()->id);
        } else {
            $wbsReports = WbsReport::query();
        }
        return $wbsReports;
    }
    public static function getTotal()
    {
        $data = WbsReport::getData()->get()->count();
        return $data;
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
    public static function getStatusCount()
    {
        $dataPending = WbsReport::getData()->where('status', self::STATUSPENDING)->get()->count();
        $dataSelesai = WbsReport::getData()->where('status', self::STATUSSELESAI)->get()->count();
        $dataDitolak = WbsReport::getData()->where('status', self::STATUSDITOLAK)->get()->count();

        return [
            self::STATUSPENDING => $dataPending,
            self::STATUSSELESAI => $dataSelesai,
            self::STATUSDITOLAK => $dataDitolak,
        ];
    }
}
