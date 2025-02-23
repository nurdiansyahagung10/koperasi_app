<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function resort(){
        return $this->hasOne(Resort::class, "pdl_id");
    }
    public function advance_payment(){
        return $this->hasMany(advance_payment::class, "pdl_id");
    }
}
