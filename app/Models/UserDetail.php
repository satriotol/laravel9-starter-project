<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone', 'address', 'gender', 'jabatan', 'instansi'];

    const GENDER1 = 'Pria';
    const GENDER2 = 'Wanita';
    public const GENDERS = [self::GENDER1, self::GENDER2];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
