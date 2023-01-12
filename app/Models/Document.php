<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['document_category_id', 'name', 'file'];

    public function document_category()
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id', 'id');
    }
}
