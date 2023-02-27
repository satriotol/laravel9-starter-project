<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Project extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $table = 'projects';

    protected $fillable = ["type_id", "opd_id", "name", "url", "start_at"];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
