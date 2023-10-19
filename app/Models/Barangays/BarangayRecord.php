<?php

namespace App\Models\Barangays;

use App\Models\Abstract\RecordModel;

class BarangayRecord extends RecordModel
{
    protected $table = 'barangay_records';
    
    protected $fillable = [
        'key_id',
        'region',
        'province',
        'city_or_municipality',
        'barangay',
    ];

    protected static $keyModel = Barangay::class;

    public function households()
    {
        return $this->hasMany(HouseholdRecord::class);
    }

    public function residents()
    {
        return $this->hasManyThrough(ResidentRecord::class, HouseholdRecord::class);
    }

    public function personnel_records()
    {
        return $this->hasMany(PersonnelRecord::class);
    }
}
