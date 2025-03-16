<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailResort;

class Members extends Model
{
    protected $table = "members";
    protected $fillable = [
        'member_name',
        'birthday_date',
        'ktp',
        'kk',
        'status',
        'province',
        'city_or_regency',
        'district',
        'village',
        'rt_and_rw',
        'street_or_building_name',
        'phone_number',
        'member_image',
        'member_ktp_image',
        'member_hold_ktp_image',
        'business',
        'business_image',
        'business_location',
        'user_id',
        'detail_resort_id',
    ];
    public function detail_resorts() {
        return $this->belongsTo(DetailResort::class, "detail_resort_id");
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
