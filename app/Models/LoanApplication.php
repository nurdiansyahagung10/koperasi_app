<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    protected $table = "loan_applications";

    protected $fillable = [
        'status',
        'binding_letter',
        'binding_letter_image',
        'nominal_loan_application',
        'nominal_admin',
        'nominal_provisi',
        'nominal_deposite',
        'nominal_pure_dropping',
        'action_by',
        'action_date',
        'member_id',
        'detail_resort_id',
        'pdl_id',
    ];

    public function user_action_by(){
        return $this->belongsTo(User::class,'action_by');
    }

    public function member(){
        return $this->belongsTo(Members::class,'member_id');
    }

    public function pdl(){
        return $this->belongsTo(Pdl::class,'pdl_id');
    }

    public function detail_resort(){
        return $this->belongsTo(DetailResort::class,'detail_resort_id');
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
