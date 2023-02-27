<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class ProjectUser extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $table = 'project_user';

    protected $fillable = ["user_id","project_id"];
}
