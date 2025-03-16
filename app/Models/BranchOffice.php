<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HeadOffice;
use App\Models\Resort;

class BranchOffice extends Model
{
    protected $table = "branch_offices";

    protected $fillable = [
        'branch_name',
        'city_or_regency',
        'district',
        'village',
        'rt_and_rw',
        'street_or_building_name',
        'phone_number',
        'maxresort',
        'service_charge',
        'admin_charge',
        'comision_charge',
        'deposite',
        'head_id'
    ];

    public function head_offices()
    {
        return $this->belongsTo(HeadOffice::class, "head_id");
    }

    public function resorts(){
        return $this->hasMany(Resort::class, "branch_id");
    }

    public function user(){
        return $this->hasMany(User::class, "branch_id");
    }
    public function pdl(){
        return $this->hasMany(Pdl::class, "branch_id");
    }

    public function findRelation($targetRelation)
    {
        foreach ($this->getRelations() as $relationName => $relationData) {
            // Jika relasi ditemukan langsung, kembalikan datanya
            if ($relationName === $targetRelation) {
                return $relationData;
            }

            // Jika relasi memiliki data, lakukan pencarian di dalamnya (rekursif)
            if (is_object($relationData)) {
                $result = $relationData->findRelation($targetRelation);
                if ($result) {
                    return $result;
                }
            }
        }

        return null; // Relasi tidak ditemukan
    }


}
