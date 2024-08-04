<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Import Models here
 */
use App\Models\User;
use App\Models\BarangayResident;

class BarangayResidentBlotter extends Model
{
    use HasFactory;

    public function resident_info(){
        return $this->hasOne(BarangayResident::class, 'id', 'barangay_resident_id');
    }
}
