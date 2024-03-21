<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentOutput extends Model
{
    use HasFactory;

    protected  $fillable = ['document_id', 'data'];

    protected  $casts = ['data' => 'array'];

    public function template()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
