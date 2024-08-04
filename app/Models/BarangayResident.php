<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Import Models here
 */
use App\Models\User;
use App\Models\BarangayResidentBlotter;
use App\Models\BarangayClearanceCertificate;
use App\Models\IndigencyCertificate;
use App\Models\ResidencyCertificate;
use App\Models\RegistrationCertificate;
use App\Models\LicensePermitCertificate;
use App\Models\Cedula;

class BarangayResident extends Model
{
    use HasFactory;

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function barangay_resident_blotter_details(){
        return $this->hasMany(BarangayResidentBlotter::class, 'barangay_resident_id');
    }


    public function barangay_clearance_details(){
        return $this->hasMany(BarangayClearanceCertificate::class, 'barangay_resident_id');
    }
    public function indigency_details(){
        return $this->hasMany(IndigencyCertificate::class, 'barangay_resident_id');
    }
    public function residency_details(){
        return $this->hasMany(ResidencyCertificate::class, 'barangay_resident_id');
    }
    public function registration_details(){
        return $this->hasMany(RegistrationCertificate::class, 'barangay_resident_id');
    }
    public function license_permit_details(){
        return $this->hasMany(LicensePermitCertificate::class, 'barangay_resident_id');
    }
    public function cedula_details(){
        return $this->hasMany(Cedula::class, 'barangay_resident_id');
    }
}
