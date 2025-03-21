<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BranchOffice;

class HeadOffice extends Model
{
    protected $table = "head_offices";

    protected $fillable = [
        "province",
        "city_or_regency",
        "district",
        "village",
        "rt_and_rw",
        "phone_number",
        "street_or_building_name"
    ];

    public function branch_offices()
    {
        return $this->hasMany(BranchOffice::class, "head_id");
    }

    public function user()
    {
        return $this->hasMany(User::class, "head_id");
    }
    public function pdl()
    {
        return $this->hasMany(Pdl::class, "head_id");
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
