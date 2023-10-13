<?php

namespace App\Models;

use App\Models\Abstract\RecordModel;

class Household extends RecordModel
{
    protected $fillable = [
        'key_id',
        'barangay_id',
        'number',
    ];

    protected static $keyModel = HouseholdKey::class;

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function members()
    {
        return $this->hasMany(Resident::class);
    }
}