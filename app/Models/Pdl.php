<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HeadOffice;
use App\Models\BranchOffice;
use App\Models\Resort;
use App\Models\advance_payment;

class Pdl extends Model
{
    protected $table = "pdls";
    protected $fillable = [
        'pdl_name',
        'basic_salary',
        'salary_date',
        'hometown',
        'phone_number',
        'sk',
        'branch_id',
        'head_id'
    ];


    public function head_office()
    {
        return $this->belongsTo(HeadOffice::class, "head_id");
    }
    public function branch_office()
    {
        return $this->belongsTo(BranchOffice::class, "branch_id");
    }

    public function resort()
    {
        return $this->hasOne(Resort::class, "pdl_id");
    }
    public function advance_payment()
    {
        return $this->hasMany(advance_payment::class, "pdl_id");
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
