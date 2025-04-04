<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;
use App\Models\Members;

class DetailResort extends Model
{
    protected $table = "detail_resorts";
    protected $fillable = [
        "resort_id",
        "day_code",
    ];

    public function resorts() {
        return $this->belongsTo(Resort::class, "resort_id");
    }

    public function members() {
        return $this->hasMany(Members::class, "detail_resort_id");
    }

    public function advance_payment(){
        return $this->hasMany(advance_payment::class,"detail_resort_id");
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
