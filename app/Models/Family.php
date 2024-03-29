<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'location_id',
        'location_type',
        'head_id',
    ];

    public function location()
    {
        return $this->morphTo();
    }

    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }
}
