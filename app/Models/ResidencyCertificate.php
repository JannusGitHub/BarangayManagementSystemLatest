<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Import Models here
 */
use App\Models\BarangayResident;
use App\Models\IssuanceConfiguration;

class ResidencyCertificate extends Model
{
    use HasFactory;

    public function resident_info(){
        return $this->hasOne(BarangayResident::class, 'id', 'barangay_resident_id');
    }
    
    public function issuance_configuration_info(){
        return $this->hasOne(IssuanceConfiguration::class, 'id', 'issuance_configuration_id');
    }
}
