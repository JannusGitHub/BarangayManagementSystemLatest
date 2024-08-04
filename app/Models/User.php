<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model; 

/**
 * Import Models here
 */
use App\Models\UserLevel;
use App\Models\BarangayResident;

class User extends Authenticatable // Authenticatable this will allow the use of Auth::user()
{
    public function user_levels(){
        return $this->hasOne(UserLevel::class, 'id', 'user_level_id');
    }

    public function barangay_resident_info(){
        return $this->hasOne(BarangayResident::class, 'user_id');
    }
}
