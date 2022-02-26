<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardNo extends Model
{
    use HasFactory;

    public function division(){
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }
    public function union(){
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }
}